<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use RealRashid\SweetAlert\Facades\Alert;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        $title = 'Delete !';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.branch.index', compact('branches'));
    }

    public function create()
    {
        return view('admin.branch.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $branch = Branch::create([
            'name' => $request->name
        ]);
        if ($branch) {
            Alert::alert('Success', 'Created Successfully!', 'success')
                ->autoClose(3000);
            return redirect()->route('admin.branch.index');
        }
    }

    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('admin.branch.edit', compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $branch = Branch::find($id);
        $branch->update([
            'name' => $request->name
        ]);
        if ($branch) {
            Alert::alert('Success', 'Updated Successfully!', 'success')
                ->autoClose(3000);
            return redirect()->route('admin.branch.index');
        }
    }


    public function  destroy($id)
    {
        $branch = Branch::find($id);
        if ($branch) {
            if ($branch->delete()) {
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
        return redirect()->route('admin.branch.index');
    }
}
