<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Contracts\Role;
use Yajra\DataTables\DataTables;

class AdminCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();
        $branch_heads = User::whereHas('roles', function ($query) {
            $query->where('name', 'branch-head');
        })->get();
        return view('admin.collection.index', compact('branches', 'branch_heads'));
    }

    public function data(Request $request)
    {
        $collections = Collection::with('branch');

        if (isset($request->filter_date_from) && isset($request->filter_date_to)) {
            $collections->whereBetween('collection_date', [
                $request->input('filter_date_from'),
                $request->input('filter_date_to')
            ]);
        } elseif (isset($request->filter_date_from)) {
            $collections->where('collection_date', '>=', $request->input('filter_date_from'));
        } elseif (isset($request->filter_date_to)) {
            $collections->where('collection_date', '<=', $request->input('filter_date_to'));
        }

        if (isset($request->filter_branch_id)) {
            $collections->where('branch_id', $request->input('filter_branch_id'));
        }

        if (isset($request->filter_branch_head)) {
            $collections->where('user', $request->input('filter_branch_head'));
        }


        return DataTables::of($collections)->make(true);
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
