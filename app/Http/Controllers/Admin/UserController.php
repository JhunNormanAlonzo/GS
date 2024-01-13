<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::whereHas('roles', function($query){
            $query->where('name', 'admin');
        })->get();
        showConfirmDelete();
        return view('admin.user.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        $user->assignRole('admin');
        if ($user) {
            showAlert("Created");
            return redirect()->route('admin.user.index');
        }
    }

    public function changePassword(Request $request){

        $user = Auth::user();

        $oldPassword = $request->old_password;
        if (Hash::check($oldPassword, $user->getAuthPassword())){
            if ($request->new_password === $request->confirm_password){
                $user->update([
                    'password' => bcrypt($request->new_password)
                ]);

                showAlert("Password Changed ");
            }else{
                customAlert('Failed!' , 'Password not matched.', 'error');
            }
        }else{
            customAlert('Failed!' , 'Password incorrect.', 'error');
        }

        return redirect()->back();

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
        $user = User::findOrFail($id);
        $user->delete();
        showAlert("Deleted");
        return redirect()->route('admin.user.index');
    }
}
