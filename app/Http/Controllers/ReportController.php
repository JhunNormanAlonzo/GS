<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $groupedGrades = Grade::select('student_id', DB::raw('AVG(average) as average_grade'))
            ->groupBy('student_id')
            ->with('student.user', 'yearLevel') // Eager load student and user relationships
            ->get();

        return view("admin.report.index", compact('groupedGrades'));

    }
}
