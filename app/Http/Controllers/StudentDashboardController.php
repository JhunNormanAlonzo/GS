<?php

namespace App\Http\Controllers;

use App\Models\Scopes\ActiveSchoolYearScope;
use App\Models\Student;
use App\Models\Subject;
use App\Models\TeacherStudent;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', auth()->user()->id)->first();
        if(request()->has('active_school_year')){
            $teacher_students = TeacherStudent::where('student_id', auth()->user()->student->id)
                ->with(['subject','schoolYear'])
                ->get();
        }else{
            $teacher_students = TeacherStudent::withoutGlobalScope(ActiveSchoolYearScope::class)->
            where('student_id', auth()->user()->student->id)
                ->with(['subject','schoolYear'])
                ->get();
        }

        return view('student.index', compact('student', 'teacher_students'));
    }
}
