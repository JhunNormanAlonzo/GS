<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\YearLevel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        showConfirmDelete();
        return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $year_levels = YearLevel::all();
        $sections = Section::all();
        return view('admin.student.create', compact('year_levels', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'section_id' => 'required',
            'lrn_no' => 'required|unique:students,lrn_no',
            'address' => 'required',
        ]);
        $user = User::create([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'password' =>  $request->password,
        ]);

        $user->assignRole('student');
        $section = Section::find($request->section_id);

        $student = Student::create([
            'user_id' => $user->id,
            'section_id' => $request->section_id,
            'year_level_id' => $section->year_level_id,
            'lrn_no' => $request->lrn_no,
            'address' => $request->address,
        ]);
        if ($student) {
            showAlert("Created");
            return redirect()->route("admin.student.index");
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
        $user = User::find($id);
        $sections = Section::all();
        $year_levels = YearLevel::all();
        return view('admin.student.edit', compact('sections', 'year_levels', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $student = Student::where('user_id', $user->id)->firstOrFail();
        $section = Section::find($request->section_id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:table,column,except,id',
            'email' => 'required|unique:users,email,' . $id,
            'section_id' => 'required',
            'lrn_no' => 'required|unique:students,lrn_no,' . $student->id,
            'address' => 'required',
        ]);

        $user->update([
            'name' =>  $request->name,
            'email' =>  $request->email,
        ]);

        $student->update([
            'section_id' => $request->section_id,
            'year_level_id' => $section->year_level_id,
            'lrn_no' => $request->lrn_no,
            'address' => $request->address,
        ]);

        showAlert("Updated");
        return redirect()->route('admin.student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $student = Student::where('user_id', $user->id)->firstOrFail();
        $student->delete();
        $user->delete();

        showAlert("Deleted");
        return redirect()->route('admin.student.index');
    }
}
