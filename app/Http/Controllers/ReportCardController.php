<?php

namespace App\Http\Controllers;

use App\Exports\GradeCardExport;
use App\Models\Grade;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\TeacherStudent;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function download(Request $request){



        $rand = date("YmdHis");
        return Excel::download(new GradeCardExport($request), "ReportCard-$rand.xlsx" );
    }
    public function index()
    {
        return view('exports.report_card');
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