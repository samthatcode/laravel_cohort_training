<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainee;

class TrainingCenterController extends Controller
{
    public function index()
    {
        // route --> /trainees/
        $trainees = Trainee::with('training_center')->orderBy('created_at', 'desc')->paginate(10);

        // dd($trainees);
        return view('trainees.index', ['trainees' => $trainees]);
    }

    public function show($id)
    {
        // route --> /trainees/{id}
        $trainee = Trainee::with('training_center')->findOrFail($id);

        return view('trainees.show', ['trainee' => $trainee]);
    }

    public function create()
    {
        // route --> /trainees/create
        return view('trainees.create');
    }

    public function store(Request $request)
    {
        // --> /trainees/ (POST)
        // Handle POST request to store a new trainee record in table
        $validatedData = $request->validate([
            'name' => 'required',
            'training_center_id' => 'required|exists:training_centers,id',
            // Add other validation rules as needed
        ]);

        $trainee = Trainee::create($validatedData);

        return redirect()->route('trainees.index')
            ->with('success', 'Trainee created successfully.');
    }

    public function destroy($id)
    {
        // --> /trainees/{id} (DELETE)
        // Handle delete request to delete a trainee record from table
        $trainee = Trainee::find($id);
        $trainee->delete();

        return redirect()->route('trainees.index')
            ->with('success', 'Trainee deleted successfully.');
    }

    public function edit($id)
    {
        // --> /trainees/{id}/edit
        $trainee = Trainee::findOrFail($id);

        return view('trainees.edit', compact('trainee'));
    }

    public function update(Request $request, $id)
    {
        // --> PUT/PATCH /trainees/{id}
        $validatedData = $request->validate([
            'name' => 'required',
            'training_center_id' => 'required|exists:training_centers,id',
            // Add other validation rules as needed
        ]);

        $trainee = Trainee::findOrFail($id);
        $trainee->update($validatedData);

        return redirect()->route('trainees.index')
            ->with('success', 'Trainee updated successfully.');
    }
}
