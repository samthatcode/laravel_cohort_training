<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainee;
use App\Models\TrainingCenter;

class TrainingCenterController extends Controller
{
    public function getAllTrainees()
    {
        // route --> /trainees/
        $trainees = Trainee::with('training_center')->latest()->paginate(10); // orderBy('created_at', 'desc')

        return view('trainees.index', ['trainees' => $trainees]);
    }

    public function getTraineeById($id)
    {
        // route --> /trainees/{id}
        $trainee = Trainee::with('training_center')->findOrFail($id);

        return view('trainees.show', ['trainee' => $trainee]);
    }

    public function createNewTraineeForm()
    {
        // route --> /trainees/create
        $trainingCenters = TrainingCenter::all();

        return view('trainees.create', ["training_centers" => $trainingCenters]);
    }

    public function storeNewTrainee(Request $request)
    {
        // --> /trainees/ (POST)
        // Handle POST request to store a new trainee record in table
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'skill' => 'required|integer|min:0|max:100',
            'bio' => 'required|string|min:20|max:100',
            'training_center_id' => 'required|exists:training_centers,id',
            // Add other validation rules as needed
        ]);

        Trainee::create($validatedData);

        return redirect()->route('trainees.index')
            ->with('success', 'Trainee created successfully.');
    }

    public function deleteTraineeById($id)
    {
        // --> /trainees/{id} (DELETE)
        // Handle delete request to delete a trainee record from table
        $trainee = Trainee::findOrFail($id);
        $trainee->delete();

        return redirect()->route('trainees.index')
            ->with('success', 'Trainee deleted successfully.');
    }

    public function editExistingTraineeForm($id)
    {
        // --> /trainees/{id}/edit
        $trainee = Trainee::findOrFail($id);

        return view('trainees.edit', compact('trainee'));
    }

    public function updateExistingTrainee(Request $request, $id)
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
