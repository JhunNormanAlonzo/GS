<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use App\Models\ModifyRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BranchHeadNotificationController extends Controller
{
    public function actRequest($id)
    {
        $modify_request =  ModifyRequest::findOrFail($id);
        $originalData = json_decode($modify_request->original);
        if ($modify_request->status === "approved") {
            $cashiers = Cashier::all();
            return view('branch-head.notification.act_request', compact('modify_request', 'cashiers', 'originalData'));
        } else if ($modify_request->status === "declined") {
            $acted = $modify_request->update([
                'actor_id' => auth()->user()->id,
                'seen' => true
            ]);
            if ($acted) {
                Alert::success("Success", "This request set as read.");
                return redirect()->route('branch-head.collection.index');
            }
        } else {
            Alert::warning("Sorry", "This request is not yet acted.");
            return redirect()->route('branch-head.collection.index');
        }
    }
    public function getPending()
    {
        $requests = ModifyRequest::where('seen', false)->where('status', 'declined')
            ->orWhere('status', 'approved')
            ->where('modified', false)
            ->get();


        $formattedPendings = $requests->map(function ($req) {
            return [
                'id' => $req->id,
                'status' => $req->status,
                'created_at' => $req->created_at,
                'created_at_diff' => $req->created_at->diffForHumans()
            ];
        });
        return response()->json([
            'pendings' => $formattedPendings,
            'count' => $requests->count()
        ]);
    }
}
