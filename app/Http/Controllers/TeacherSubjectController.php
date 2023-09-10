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
        $conflicting_subjects = [];
        TeacherSubject::where('teacher_id', $teacher_id)->delete();
        // Loop through the selected subjects
        foreach ($selected_subjects as $sub) {
            // Check if the subject is already assigned to another teacher
            $existingAssignment = TeacherSubject::where('subject_id', $sub)->first();

            if ($existingAssignment && $existingAssignment->teacher_id !== $teacher_id) {
                // Subject is already assigned to another teacher, add it to the conflict list
                $conflicting_subjects[] = $sub;
            } else {
                // If no conflict, create the teacher-subject relationship
                TeacherSubject::create([
                    'teacher_id' => $teacher_id,
                    'subject_id' => $sub,
                ]);
            }
        }

        if (!empty($conflicting_subjects)) {

            customAlert("Subject Conflict.", "Some subject not inserted.", "warning");
        } else {
            showAlert("Assigned");
        }

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
