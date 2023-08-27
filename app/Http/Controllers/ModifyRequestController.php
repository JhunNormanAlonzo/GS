<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\ModifyRequest;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use RealRashid\SweetAlert\Facades\Alert;

class ModifyRequestController extends Controller
{

    public function index()
    {
        $modifies = ModifyRequest::orderBy('updated_at', 'desc')->get();
        return view("admin.collection.modify", compact('modifies'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'remarks' => 'required',
            'collection_id' => 'required',
        ]);
        $collection = Collection::findOrFail($request->collection_id);

        $modify_request = ModifyRequest::create([
            'requestor_id' => auth()->user()->id,
            'collection_id' => $request->collection_id,
            'remarks' => $request->remarks,
            'original' => json_encode($collection)
        ]);


        if ($modify_request) {
            Alert::alert('Success', 'Reqquested Successfully!', 'success')
                ->autoClose(3000);
            return redirect()->route('branch-head.collection.index');
        }
    }
}
