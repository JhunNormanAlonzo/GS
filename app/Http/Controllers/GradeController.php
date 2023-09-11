<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function viewGrade($year_level_id, $section_id, $subject_id, $student_id)
    {
        $subject = Subject::find($subject_id);

        if ($student_id != auth()->user()->student->id) {
            abort(403, "You are not authorized to view another student's grades.");
        }
        $grade = Grade::where('student_id', $student_id)
            ->where('year_level_id', $year_level_id)
            ->where('section_id', $section_id)
            ->where('subject_id', $subject_id)->first();

        return view('student.grade.index', compact('grade', 'subject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function setGradeStudentSubject(Request $request, $student_id, $subject_id)
    {
        $this->validate($request, [
            'first_grading' => 'required|numeric',
            'second_grading' => 'required|numeric',
            'third_grading' => 'required|numeric',
            'fourth_grading' => 'required|numeric',
        ]);

        $teacher_id = Auth::user()->teacher->id;
        $student = Student::find($student_id);
        $subject = Subject::find($subject_id);

        $grade = Grade::updateOrCreate(
            [
                'teacher_id' => $teacher_id,
                'student_id' => $student_id,
                'year_level_id' => $subject->year_level_id,
                'section_id' => $student->section_id,
                'subject_id' => $subject->id
            ],
            [
                'first_grading' => $request->first_grading,
                'second_grading' => $request->second_grading,
                'third_grading' => $request->third_grading,
                'fourth_grading' => $request->fourth_grading,
                'average' => ($request->first_grading + $request->second_grading + $request->third_grading + $request->fourth_grading) / 4
            ]
        );


        if ($grade) {
            showAlert("Grade Set");
            return redirect()->back();
        }
    }
}
