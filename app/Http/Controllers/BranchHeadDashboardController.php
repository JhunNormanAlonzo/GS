<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use App\Models\Collection;
use Illuminate\Http\Request;

class BranchHeadDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_collections = Collection::where('branch_id', auth()->user()->branch_id);
        $cashier = Cashier::where('branch_id', auth()->user()->branch_id);
        return view('branch-head.dashboard', compact('total_collections', 'cashier'));
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
