<?php

namespace App\Http\Controllers;

use App\Models\TeacherSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherDashboardController extends Controller
{
    public function index()
    {

        $teacher_subjects = TeacherSubject::where('teacher_id', Auth::user()->teacher->id)->get();
        return view('teacher.index', compact('teacher_subjects'));
    }
}
