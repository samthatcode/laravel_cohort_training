<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    protected $fillable = [
        'name',
        'skill',
        'bio',
        'training_center_id',
    ];

    /** @use HasFactory<\Database\Factories\TraineeFactory> */
    use HasFactory;

    public function training_center()
    {
        return $this->belongsTo(TrainingCenter::class);
    }
}
