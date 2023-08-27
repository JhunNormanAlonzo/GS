<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cashiers = Cashier::where('branch_id', auth()->user()->branch_id)->get();
        $title = 'Delete!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('branch-head.cashier.index', compact('cashiers'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branch-head.cashier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
        ]);

        $cashier = Cashier::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'branch_id' => Auth::user()->branch_id
        ]);

        if ($cashier) {
            Alert::alert('Success', 'Created Successfully!', 'success')
                ->autoClose(3000);
            return redirect()->route('branch-head.cashier.index');
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
        $collection = Collection::where('cashier_id', $id)->first();
        $cashier = Cashier::find($id);
        if ($collection) {
            $cashier->delete();
            Alert::alert('Success', 'Deleted Successfully!', 'success')
                ->autoClose(3000);
        } else {
            Alert::alert('Error', 'Sorry, this record cannot be deleted as it has associated data in other tables.', 'error')
                ->autoClose(3000);
        }
        return redirect()->route('branch-head.cashier.index');
    }
}
