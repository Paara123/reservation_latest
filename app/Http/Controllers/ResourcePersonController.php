<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResourcePerson;

class ResourcePersonController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    
    $resourcePersons = ResourcePerson::query()
        ->when($search, function($query, $search) {
            return $query->where('resource_person_name', 'like', "%{$search}%")
                         ->orWhere('resource_person_contact_no', 'like', "%{$search}%")
                         ->orWhere('resource_person_email', 'like', "%{$search}%")
                         ->orWhere('resource_person_address', 'like', "%{$search}%")
                         ->orWhere('expertise_fields', 'like', "%{$search}%")
                         ->orWhere('institute', 'like', "%{$search}%");
        })
        ->paginate(10); // Set the number of items per page here

    return view('admin.resource_person.index', compact('resourcePersons'));
}




    public function create()
    {
        return view('admin.resource_person.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'resource_person_name' => 'required|string|max:255',
            'resource_person_contact_no' => 'required|digits:10',
            'resource_person_email' => 'required|email|unique:resource_persons',
            'resource_person_address' => 'required|string',
            'expertise_fields' => 'required|string',
            'institute' => 'required|string',
        ]);

        $resourcePerson = new ResourcePerson();
        $resourcePerson->resource_person_id = ResourcePerson::max('resource_person_id') + 1; 
        $resourcePerson->resource_person_name = $request->input('resource_person_name');
        $resourcePerson->resource_person_contact_no = $request->input('resource_person_contact_no');
        $resourcePerson->resource_person_email = $request->input('resource_person_email');
        $resourcePerson->resource_person_address = $request->input('resource_person_address');
        $resourcePerson->expertise_fields = $request->input('expertise_fields');
        $resourcePerson->institute = $request->input('institute');
        $resourcePerson->save();

        return redirect()->route('admin.home')->with('status', 'Resource Person added successfully!');
    }

    public function edit($id)
    {
        $resourcePerson = ResourcePerson::findOrFail($id);
        return view('admin.resource_person.edit', compact('resourcePerson'));
    }

    public function update(Request $request, $id)
    {
        $resourcePerson = ResourcePerson::findOrFail($id);
    
        $validatedData = $request->validate([
            'resource_person_name' => 'required|string|max:255',
            'resource_person_contact_no' => 'required|numeric',
            'resource_person_email' => 'required|email|unique:resource_persons,resource_person_email,' . $id,
            'resource_person_address' => 'required|string',
            'expertise_fields' => 'required|string',
            'institute' => 'required|string|max:255',
        ]);
    
        $resourcePerson->update($validatedData);
    
        return redirect()->route('resource-person.index')->with('status', 'Resource Person updated successfully.');
    }

    
    public function destroy($id)
    {
        $resourcePerson = ResourcePerson::findOrFail($id);
        $resourcePerson->delete();

        return redirect()->route('resource-person.index')->with('status', 'Resource Person deleted successfully.');
    }
}
