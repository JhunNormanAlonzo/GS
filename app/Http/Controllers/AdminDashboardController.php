<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Collection;
use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\YearLevel;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $students = Student::all();
        $teachers = Teacher::all();
        $sections = Section::all();
        $yearlevels = YearLevel::all();
        $current_school_year = SchoolYear::where('is_active', true)->first()->name;
        $subjects = Subject::all();
        return view('admin.index', compact(
            'students',
            'teachers',
            'sections',
            'yearlevels',
            'subjects',
            'current_school_year'
        ));
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
}
