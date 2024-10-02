<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResourcePerson;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResourcePersonRegisterController extends Controller
{
    public function create()
    {
        return view('resource_persons.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'resource_person_name' => 'required|string|max:255',
            'resource_person_email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'resource_person_contact_no' => 'required|numeric',
            'resource_person_address' => 'required|string',
            'expertise_fields' => 'required|string',
            'institute' => 'required|string',
        ]);

        // Save the resource person in the users table
        $user = User::create([
            'name' => $request->resource_person_name,
            'email' => $request->resource_person_email,
            'password' => Hash::make($request->password),
            'type' => 2, // Type 2 for resource persons
        ]);

        // Save additional details in the resource_persons table
        ResourcePerson::create([
            'resource_person_id' => $user->id, // Link to the user ID
            'resource_person_name' => $request->resource_person_name,
            'resource_person_contact_no' => $request->resource_person_contact_no,
            'resource_person_email' => $request->resource_person_email,
            'resource_person_address' => $request->resource_person_address,
            'expertise_fields' => $request->expertise_fields,
            'institute' => $request->institute,
        ]);

        return redirect()->route('admin.home')->with('status', 'Resource Person registered successfully!');
    }
}
