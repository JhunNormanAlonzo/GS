<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\YearLevel;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        showConfirmDelete();
        return view('admin.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $year_levels = YearLevel::all();
        return view('admin.subject.create', compact('year_levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'year_level_id' => 'required',
            'code' => 'required|unique:subjects,code,NULL,id,year_level_id,' . $request->year_level_id,
            'name' => 'required'
        ], [
            'year_level_id.required' => 'The year level is required.',
            'code.unique' => 'The code must be unique for the selected year level.',
        ]);

        $year_level = Subject::create([
            'year_level_id' => $request->year_level_id,
            'code' => $request->code,
            'name' => $request->name
        ]);

        if ($year_level) {
            showAlert("Created");
            return redirect()->route('admin.subject.index');
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
        $subject = Subject::find($id);
        $year_levels = YearLevel::all();
        return view("admin.subject.edit", compact("subject", "year_levels"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subject = Subject::find($id);

        $this->validate($request, [
            'code' => 'required|unique:subjects,code,' . $id,
            'name' => 'required'
        ]);

        $subject->update([
            'code' => $request->code,
            'name' => $request->name
        ]);

        if ($subject) {
            showAlert("Updated");
            return redirect()->route('admin.subject.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);
        if ($subject->delete()) {
            showAlert("Deleted");
            return redirect()->route('admin.subject.index');
        }
    }
}
