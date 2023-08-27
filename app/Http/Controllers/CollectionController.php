<?php

namespace App\Http\Controllers;

use App\DataTables\CollectionDataTable;
use App\Models\Cashier;
use App\Models\Collection;
use App\Models\ModifyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;


class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::where('branch_id', Auth::user()->branch_id)
            ->orderBy('id', 'desc')
            ->get();
        return view('branch-head.collection.index', compact('collections'));
    }



    public function create()
    {
        $cashiers = Cashier::all();
        return view('branch-head.collection.create', compact('cashiers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'collection_date' => 'required|date',
            'shift' => 'required|string',
            'cashier' => 'required|string',
            'gross' => 'required|numeric|min:0',
            'paid_in' => 'required|numeric|min:0',
            'purchase_order' => 'nullable|string',
            'paid_out' => 'required|numeric|min:0',
            'redeem' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0',
            'lubes' => 'required|numeric|min:0',
            'cheque' => 'required|numeric|min:0',
            'cash_on_hand' => 'required|numeric|min:0',
        ]);


        $netSale = $request->input('gross') - $request->input('purchase_order') - $request->input('paid_out') - $request->input('redeem') - $request->input('discount') + $request->input('paid_in') + $request->input('lubes');
        $cashier = Cashier::find($request->cashier);
        $collection = Collection::create([
            'branch_id' => Auth::user()->branch_id,
            'cashier_id' => $cashier->id,
            'user_id' => Auth::user()->id,
            'user' => Auth::user()->name,
            'collection_date' => $request->input('collection_date'),
            'shift' => $request->input('shift'),
            'cashier' => $cashier->lastname . " " . $cashier->firstname . " " . $cashier->middlename,
            'gross' => $request->input('gross'),
            'paid_in' => $request->input('paid_in'),
            'purchase_order' => $request->input('purchase_order'),
            'paid_out' => $request->input('paid_out'),
            'redeem' => $request->input('redeem'),
            'discount' => $request->input('discount'),
            'lubes' => $request->input('lubes'),
            'cheque' => $request->input('cheque'),
            'cash_on_hand' => $request->input('cash_on_hand'),
            'short_over' => $request->input('short_over'),
            'net' => $netSale,
        ]);

        if ($collection) {
            Alert::alert('Success', 'Created Successfully!', 'success')
                ->autoClose(3000);
            return redirect()->route('branch-head.collection.index');
        }
    }

    public function updateRequest(Request $request, $collection_id, $modify_request_id)
    {

        $this->validate($request, [
            'collection_date' => 'required|date',
            'shift' => 'required|string',
            'cashier' => 'required|string',
            'gross' => 'required|numeric|min:0',
            'paid_in' => 'required|numeric|min:0',
            'purchase_order' => 'nullable|string',
            'paid_out' => 'required|numeric|min:0',
            'redeem' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0',
            'lubes' => 'required|numeric|min:0',
            'cheque' => 'required|numeric|min:0',
            'cash_on_hand' => 'required|numeric|min:0',
        ]);


        $netSale = $request->input('gross') - $request->input('purchase_order') - $request->input('paid_out') - $request->input('redeem') - $request->input('discount') + $request->input('paid_in') + $request->input('lubes');

        $cashier = Cashier::find($request->cashier);
        $collection = Collection::find($collection_id);

        $collection->update([
            'branch_id' => Auth::user()->branch_id,
            'cashier_id' => $cashier->id,
            'user_id' => Auth::user()->id,
            'user' => Auth::user()->name,
            'collection_date' => $request->input('collection_date'),
            'shift' => $request->input('shift'),
            'cashier' => $cashier->lastname . " " . $cashier->firstname . " " . $cashier->middlename,
            'gross' => $request->input('gross'),
            'paid_in' => $request->input('paid_in'),
            'purchase_order' => $request->input('purchase_order'),
            'paid_out' => $request->input('paid_out'),
            'redeem' => $request->input('redeem'),
            'discount' => $request->input('discount'),
            'lubes' => $request->input('lubes'),
            'cheque' => $request->input('cheque'),
            'cash_on_hand' => $request->input('cash_on_hand'),
            'short_over' => $request->input('short_over'),
            'net' => $netSale,
        ]);

        if ($collection) {
            $modify = ModifyRequest::find($modify_request_id);
            $modify->update([
                'changes' => $collection->toJson(),
                'seen' => true,
                'modified' => true,
            ]);

            Alert::alert('Success', 'Updated Successfully!', 'success')
                ->autoClose(3000);

            return redirect()->route('branch-head.collection.index');
        }
    }
}
