<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class TeacherStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function viewStudentOfSubject($subject_id)
    {
        $subject = Subject::findOrFail($subject_id);

        $students = Student::where('year_level_id', $subject->year_level_id)->get();
        showConfirmDelete();
        return view('teacher.student.index', compact('students', 'subject'));
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
    public function setDropout($id)
    {
        // dd($id);
        // $user = User::findOrFail($id);
        // $student = Student::where('user_id', $user->id)->firstOrFail();
        // $student->delete();
        // $user->forceDelete();
        return redirect()->route('teacher.dashboard.index');
    }


    public function destroy(string $id)
    {
    }
}
