<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Subject;
use App\Models\TeacherStudent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Builder\Stub;

class TeacherStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function viewStudentOfSubject($subject_id)
    {
        $subject = Subject::findOrFail($subject_id);
        $teacher = Auth::user()->teacher;
        $active_school_year = SchoolYear::where('is_active', true)->first();
        $all_students = Student::all();

        $teacher_students = TeacherStudent::where('teacher_id', $teacher->id)
            ->where('subject_id', $subject_id)->get();

            showConfirmDelete();
        return view('teacher.teacher-student.index', compact('teacher_students', 'subject', 'all_students', 'teacher', 'active_school_year'));
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
    public function setDropout($teacher_student_id)
    {
//         dd($teacher_student_id);
        // $user = User::findOrFail($id);
        // $student = Student::where('user_id', $user->id)->firstOrFail();
        // $student->delete();
        // $user->forceDelete();
        $teacherStudent = TeacherStudent::find($teacher_student_id);

        if ($teacherStudent) {
            // Toggle the value of is_dropout
            $teacherStudent->update([
                'is_dropout' => !$teacherStudent->is_dropout,
            ]);
        }
        return redirect()->back();
    }


    public function destroy(string $id)
    {
    }

    public function addToClass(Request $request){
        $teacher = Auth::user()->teacher;

        $active_school_year = SchoolYear::where('is_active', true)->first();

        $teacher_id = $teacher->id;

        $active_school_year_id = $active_school_year->id;

        $data = [
            'teacher_id' => $teacher_id,
            'school_year_id' => $active_school_year_id,
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
        ];

        $validation_data = [
            'school_year_id' => $active_school_year_id,
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
        ];


        $status = TeacherStudent::where($validation_data)->first();

        if ($status) {
            // Record already exists
            customAlert('Exists!', 'Record already exists to you or to other teacher!', 'error');
        } else {
            // Record doesn't exist, create a new one
            TeacherStudent::create($data);
            customAlert('Created!', 'New record created!', 'success');
        }
        return redirect()->back();

    }
}
