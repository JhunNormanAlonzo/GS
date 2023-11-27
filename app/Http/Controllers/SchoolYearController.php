<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school_years = SchoolYear::all();
        showConfirmDelete();
        return view('admin.school-year.index', compact('school_years'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.school-year.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:school_years,name,' . $request->name,
        ]);

        $school_year = SchoolYear::create([
            'name' => $request->name,
            'is_active' => false
        ]);

        if ($school_year) {
            showAlert("Created");
            return redirect()->route('admin.school-year.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolYear $schoolYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolYear $schoolYear)
    {

        return view("admin.school-year.edit", compact("schoolYear"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolYear $schoolYear)
    {
        $this->validate($request, [
            'name' => 'required|unique:school_years,name,'.$schoolYear->id
        ]);

        $school_year = $schoolYear->update(['name' => $request->name]);

        if ($school_year) {
            showAlert("Updated");
            return redirect()->route('admin.school-year.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolYear $schoolYear)
    {
        if($schoolYear->is_active == true){
            customAlert('Error!', 'Sorry! cant delete current school year.', 'error');
            return redirect()->route('admin.school-year.index');
        }

        if ($schoolYear->delete()) {
            showAlert("Deleted");
            return redirect()->route('admin.school-year.index');
        }
    }

    public function setActive(SchoolYear $schoolYear){
        $allSchoolYears = SchoolYear::all();
//        dd($schoolYear);

        $allSchoolYears->each(function ($schoolYear) {
            $schoolYear->update(['is_active' => false]);
        });

       if($schoolYear->update(['is_active' => true])){
           showAlert("Set Active");
           return redirect()->route('admin.school-year.index');
       }
    }
}
