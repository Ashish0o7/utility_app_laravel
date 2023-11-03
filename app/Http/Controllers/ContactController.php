<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $contacts = Contact::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('contacts.index', compact('contacts'));
    }


    public function create()
    {
        return view('contacts.form');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Create a new contact
        Contact::create($validatedData);

        return redirect()->route('contacts.index');
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.form', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Update the contact
        $contact->update($validatedData);

        return redirect()->route('contacts.index');
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect()->route('contacts.index');
    }
}
