<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use Illuminate\Http\Request;

class TeacherSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        $subjects = Subject::all();
        showConfirmDelete();
        return view('admin.teacher-subject.index', compact('teachers', 'subjects'));
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
        $teacher_id = $request->teacher_id;
        $selected_subjects = $request->subject;
        TeacherSubject::where('teacher_id', $teacher_id)->delete();

        foreach ($selected_subjects as $sub) {
            TeacherSubject::create([
                'teacher_id' => $teacher_id,
                'subject_id' => $sub,
            ]);
        }

        showAlert("Assigned");

        return redirect()->route('admin.teacher-subject.index');
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
}
