<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenditure; // Make sure to use the correct namespace for your Expenditure model

class ExpenditureController extends Controller
{
    public function index()
    {
        // Paginate the expenditures and pass them to the view
        $expenditures = Expenditure::paginate(10); // You can adjust the number of items per page (e.g., 10)

        return view('expenditures.index', ['expenditures' => $expenditures]);
    }



    public function create()
    {
        // Show the form for creating a new expenditure
        return view('expenditures\create');
    }

    public function store(Request $request)
    {
        // Validate and save a new expenditure
        $request->validate([
            'description' => 'required',
            'amount' => 'required|numeric',
            'category' => 'required',
            // Add more validation rules as needed
        ]);

        Expenditure::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'category' => $request->category,
            'date' => now(),
            // You may adjust the date as needed
        ]);

        return redirect()->route('expenditures.index')->with('success', 'Expenditure added successfully.');
    }

    public function edit($id)
    {
        // Show the form for editing a specific expenditure
        $expenditure = Expenditure::findOrFail($id);
        return view('expenditures.edit', compact('expenditure'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update a specific expenditure
        $request->validate([
            'description' => 'required',
            'amount' => 'required|numeric',
            'category' => 'required',
            // Add more validation rules as needed
        ]);

        $expenditure = Expenditure::findOrFail($id);
        $expenditure->update([
            'description' => $request->description,
            'amount' => $request->amount,
            'category' => $request->category,
            // Update other fields as needed
        ]);

        return redirect()->route('expenditures.index')->with('success', 'Expenditure updated successfully.');
    }

    public function destroy($id)
    {
        // Delete a specific expenditure
        $expenditure = Expenditure::findOrFail($id);
        $expenditure->delete();

        return redirect()->route('expenditures.index')->with('success', 'Expenditure deleted successfully.');
    }
}
