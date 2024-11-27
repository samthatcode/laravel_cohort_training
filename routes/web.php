<?php

use App\Http\Controllers\TrainingCenterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/trainees', [TrainingCenterController::class, 'index'])->name('trainees.index');
Route::get('/trainees/create', [TrainingCenterController::class, 'create'])->name('trainees.create');
Route::get('/trainees/{id}', [TrainingCenterController::class, 'show'])->name('trainees.show');



/*

  new resource -> Dojo(s)
    - name, description, location

  each ninja belongs to a single dojo

  Ninja table
  ---------------------------------
  id | name | bio | skill | dojo_id
  ---------------------------------
  01 | jack | ... | 59    | 03
  02 | jill | ... | 85    | 01
  03 | sian | ... | 40    | 03
  04 | brad | ... | 70    | 02
  05 | lars | ... | 99    | 01
  06 | anne | ... | 55    | 01
  ---------------------------------

  Dojo table
  ----------------------------------
  id | name | description | location
  ----------------------------------
  01 | gold | ...         | uk
  02 | abc  | ...         | germany
  03 | hwah | ...         | india

*/
