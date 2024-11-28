<?php

use App\Http\Controllers\TrainingCenterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/trainees', [TrainingCenterController::class, 'getAllTrainees'])->name('trainees.index');

Route::get('/trainees/create', [TrainingCenterController::class, 'createNewTraineeForm'])->name('trainees.create');

Route::get('/trainees/{id}', [TrainingCenterController::class, 'getTraineeById'])->name('trainees.show');

Route::post('/trainees', [TrainingCenterController::class, 'storeNewTrainee'])->name('trainees.store');

Route::delete('/trainees/{id}', [TrainingCenterController::class, 'deleteTraineeById'])->name('trainees.destroy');



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
