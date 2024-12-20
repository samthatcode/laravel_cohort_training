<?php

use App\Http\Controllers\TrainingCenterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('trainees.home');

Route::get('/trainees', [TrainingCenterController::class, 'getAllTrainees'])->name('trainees.index');

Route::get('/trainees/create', [TrainingCenterController::class, 'createNewTraineeForm'])->name('trainees.create');

Route::get('/trainees/{id}', [TrainingCenterController::class, 'getTraineeById'])->name('trainees.show');

Route::get('/trainees/{id}/edit', [TrainingCenterController::class, 'editExistingTraineeForm'])->name('trainees.edit');

Route::post('/trainees', [TrainingCenterController::class, 'saveNewTrainee'])->name('trainees.store');

Route::put('/trainees/{id}', [TrainingCenterController::class, 'updateExistingTrainee'])->name('trainees.update');

Route::delete('/trainees/{id}', [TrainingCenterController::class, 'deleteTraineeById'])->name('trainees.destroy');


// Route prefixing
// Route::prefix('trainees')->name('trainees.')->group(function () {
//     Route::get('/', [TrainingCenterController::class, 'getAllTrainees'])->name('index');
//     Route::get('/create', [TrainingCenterController::class, 'createNewTraineeForm'])->name('create');
//     Route::get('/{id}', [TrainingCenterController::class, 'getTraineeById'])->name('show');
//     Route::get('/{id}/edit', [TrainingCenterController::class, 'editExistingTraineeForm'])->name('edit');
//     Route::post('/', [TrainingCenterController::class, 'saveNewTrainee'])->name('store');
//     Route::put('/{id}', [TrainingCenterController::class, 'updateExistingTrainee'])->name('update');
//     Route::delete('/{id}', [TrainingCenterController::class, 'deleteTraineeById'])->name('destroy');
// });

/*

  new resource -> TrainingCenter(s)
    - name, description, location

  each trainee belongs to a single TrainingCenter

  Trainee table
  ---------------------------------
  id | name | bio | skill | training_center_id
  ---------------------------------
  01 | jack | ... | 59    | 03
  02 | jill | ... | 85    | 01
  03 | sian | ... | 40    | 03
  04 | brad | ... | 70    | 02
  05 | lars | ... | 99    | 01
  06 | anne | ... | 55    | 01
  ---------------------------------

  TrainingCenter table
  ----------------------------------
  id | name | description | location
  ----------------------------------
  01 | gold | ...         | uk
  02 | abc  | ...         | germany
  03 | hwah | ...         | india

*/
