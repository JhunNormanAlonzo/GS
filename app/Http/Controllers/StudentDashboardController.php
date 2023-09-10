<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', auth()->user()->id)->first();

        $subjects = Subject::where(
            'year_level_id',
            $student->year_level_id
        )->get();
        return view('student.index', compact('student', 'subjects'));
    }
}
