<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('search'))
        {
	        $query->where('name','LIKE','%' .$request->search. '%')
		            ->orWhere('email','LIKE','%' .$request->search. '%');
        }

        if ($request->filled('sort_by'))
        {
	        $query->orderBy($request->sort_by, $request->sort_order ?? 'asc');
        }

        $contacts = $query-> paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'nullable|numeric|digits_between:10,20',
            'address' => 'nullable|string|max:100'
        ]);

        //dd($validated); // Check if validation passes and shows the correct data


        Contact::create($validated);

        return redirect()->route('contact.index')->with('success', 'Contact created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'nullable|numeric|digits_between:10,20',
            'address' => 'nullable|string|max:100'
        ]);

        $contact = Contact::find($id);
        $contact->update($validated);

        return redirect()->route('contact.index')->with('success', 'Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully');
    }
}
