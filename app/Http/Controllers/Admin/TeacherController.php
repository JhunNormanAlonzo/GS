<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        showConfirmDelete();
        return view('admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::all();
        $employee_number = Teacher::latest()->value('emp_no') + 1;
        $emp_no = str_pad($employee_number, 6, '0', STR_PAD_LEFT);
        return view('admin.teacher.create', compact('sections', 'emp_no'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'section_id' => 'required',
            'emp_no' => 'required',
            'address' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->email,
            'password' => $request->password,
        ]);

        $user->assignRole('teacher');

        $teacher = Teacher::create([
            'user_id' => $user->id,
            'section_id' => $request->section_id,
            'emp_no' => $request->emp_no,
            'address' => $request->address,
        ]);

        if ($teacher) {
            showAlert("Created");
            return redirect()->route('admin.teacher.index');
        }
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
        $teacher = Teacher::find($id);
        $sections = Section::all();
        return view('admin.teacher.edit', compact('teacher', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'section_id' => 'required',
            'address' => 'required',
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($id);
        $teacher = Teacher::where('user_id', $user->id)->firstOrFail();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update the teacher data
        $teacher->update([
            'section_id' => $request->section_id,
            'address' => $request->address,
        ]);

        showAlert("Updated");
        return redirect()->route('admin.teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $teacher = Teacher::where('user_id', $user->id)->firstOrFail();
        $teacher->delete();
        $user->delete();

        showAlert("Deleted");
        return redirect()->route('admin.teacher.index');
    }
}
