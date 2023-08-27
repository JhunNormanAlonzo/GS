<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class BranchHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branch_heads = User::whereHas('roles', function ($query) {
            $query->where('name', 'branch-head');
        })->get();

        $title = 'Delete !';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.branch-head.index', compact('branch_heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        return view('admin.branch-head.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:3',
            'branch_id' => 'required'
        ]);

        $branch_head = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'branch_id' => $request->branch_id
        ]);



        $role = Role::where('name', 'branch-head')->first();
        $branch_head->assignRole($role);
        if ($branch_head) {
            Alert::alert('Success', 'Created Successfully!', 'success')
                ->autoClose(3000);
            return redirect()->route('admin.branch-head.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branches = Branch::all();
        $branch_head = User::find($id);
        return view('admin.branch-head.edit', compact('branch_head', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'branch_id' => 'required'
        ]);
        $branch_head = User::find($id);

        $branch_head->update([
            'name' => $request->name,
            'email' => $request->email,
            'branch_id' => $request->branch_id
        ]);
        if ($branch_head) {
            Alert::alert('Success', 'Updated Successfully!', 'success')
                ->autoClose(3000);
            return redirect()->route('admin.branch-head.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch_head = User::find($id);
        if ($branch_head) {
            if ($branch_head->delete()) {
                Alert::alert('Success', 'Deleted Successfully!', 'success')
                    ->autoClose(3000);
            } else {
                Alert::alert('Error', 'Deletion Failed', 'error')
                    ->autoClose(3000);
            }
        } else {
            Alert::alert('Error', 'Branch not found', 'error')
                ->autoClose(3000);
        }
        return redirect()->route('admin.branch-head.index');
    }
}
