<?php

namespace App\Http\Controllers;

use App\Exports\StudentGradePerSubjectExport;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentReportController extends Controller
{
    public function printGrade()
    {
        $student_id = auth()->user()->student->id;
        $year_level_id = auth()->user()->student->year_level_id;
        $section_id = auth()->user()->student->section_id;

        $date_today = now()->format("Y-m-d H:i s");

        $filename = "student_grade" . $date_today . ".xlsx";
        return Excel::download(new StudentGradePerSubjectExport($student_id, $year_level_id, $section_id),  $filename);
    }
}
