<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\YearLevel;
use Illuminate\Http\Request;
use Random\Engine\Secure;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        showConfirmDelete();
        return view('admin.section.index', compact('sections'));
    }

    public function getWhereYearLevel($year_level_id)
    {

        $sections = Section::where('year_level_id', $year_level_id)->get();
        $formattedSections = [];
        foreach ($sections as $sec) {
            $formattedSections[] = [
                'id' => $sec->id,
                'value' => $sec->name
            ];
        }

        return $formattedSections;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $year_levels = YearLevel::all();
        return view('admin.section.create', compact('year_levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'year_level_id' => 'required',
            'name' => 'required|unique:sections,name'
        ], [
            'year_level_id.required' => 'The year level is required.',
        ]);

        $section = Section::create([
            'year_level_id' => $request->year_level_id,
            'name' => $request->name
        ]);

        if ($section) {
            showAlert("Created");
            return redirect()->route('admin.section.index');
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
        $section = Section::find($id);
        $year_levels = YearLevel::all();
        return view('admin.section.edit', compact('section', 'year_levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $section = Section::find($id);
        $this->validate($request, [
            'year_level_id' => 'required',
            'name' => 'required|unique:sections,name,id,', $id
        ], [
            'year_level_id.required' => 'The year level is required.',
        ]);

        $section->update([
            'year_level_id' => $request->year_level_id,
            'name' => $request->name
        ]);

        if ($section) {
            showAlert("Updated");
            return redirect()->route('admin.section.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $section = Section::find($id);
        if ($section->delete()) {
            showAlert("Deleted");
            return redirect()->route('admin.section.index');
        }
    }
}
