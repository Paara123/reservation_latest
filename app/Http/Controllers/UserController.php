<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'type')->get();
        return view('admin.user.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'type' => 'required|in:user,admin,manager',
        ]);
        
        $user->type = array_search($request->input('type'), ['user', 'admin', 'manager']);
        $user->save();

        return redirect()->route('admin.user.index')->with('status', 'User type updated successfully.');
    }

    public function dashboard()
    {
        $user = auth()->user();
        $reservations = ReservationDetail::where('user_id', $user->id)->with('status')->get();

        return view('user.dashboard', compact('reservations'));
    }

}
