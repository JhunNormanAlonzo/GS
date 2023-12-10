<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
//        $groupedGrades = Grade::select('student_id', DB::raw('AVG(average) as average_grade'))
//            ->groupBy('student_id')
//            ->with('student.user', 'yearLevel')
//            ->get();
        $groupedGrades = Grade::join('teacher_students', 'grades.teacher_student_id', '=', 'teacher_students.id')
            ->groupBy('teacher_students.student_id')
            ->select('teacher_students.student_id', DB::raw('AVG(grades.average) AS total_grade'))
            ->get();
        $groupedGrades = Grade::all();

//        dd($groupedGrades);


        return view("admin.report.index", compact('groupedGrades'));

    }
}
