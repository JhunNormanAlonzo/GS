<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvisoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher_section_id = Auth::user()->teacher->section_id;
        $advisories = Student::where('section_id', $teacher_section_id)->get();
        $section = Auth::user()->teacher->first()->section->name;

        return view('teacher.advisory.index', compact('advisories', 'section'));
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
