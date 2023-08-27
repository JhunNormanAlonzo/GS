<?php

namespace App\Http\Controllers;

use App\Models\ModifyRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function actRequestApprove($id)
    {
        $modify_request =  ModifyRequest::findOrFail($id);
        if ($modify_request->status !== "pending") {
            Alert::warning("Sorry", "This request is not yet established or already acted.");
            return redirect()->route('admin.collection.index');
        }

        $acted = $modify_request->update([
            'actor_id' => auth()->user()->id,
            'status' => 'approved'
        ]);
        if ($acted) {
            Alert::success("Success", "This request is set as declined.");
            return redirect()->route('admin.collection.index');
        }
    }

    public function actRequestDecline($id)
    {
        $modify_request =  ModifyRequest::findOrFail($id);
        if ($modify_request->status !== "pending") {
            Alert::warning("Sorry", "This request is not yet established or already acted.");
            return redirect()->route('admin.collection.index');
        }

        $acted = $modify_request->update([
            'actor_id' => auth()->user()->id,
            'status' => 'declined'
        ]);
        if ($acted) {
            Alert::success("Success", "This request is set as declined.");
            return redirect()->route('admin.collection.index');
        }
    }

    public function actRequest($id)
    {
        $modify_request =  ModifyRequest::findOrFail($id);
        if ($modify_request->status !== "pending") {
            Alert::warning("Sorry", "This request is not yet established or already acted.");
            return redirect()->route('admin.collection.index');
        }
        return view('admin.notification.act_request', compact('modify_request'));
    }

    public function getPending()
    {
        $pendings = ModifyRequest::with('requestor.branch')->where('status', 'pending')->get();

        $formattedPendings = $pendings->map(function ($pending) {
            return [
                'id' => $pending->id,
                'requestor' => $pending->requestor->branch->name,
                'created_at' => $pending->created_at,
                'created_at_diff' => $pending->created_at->diffForHumans()
            ];
        });
        return response()->json([
            'pendings' => $formattedPendings,
            'count' => $pendings->count()
        ]);
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
