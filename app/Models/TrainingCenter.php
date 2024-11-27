<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCenter extends Model
{
    /** @use HasFactory<\Database\Factories\TrainingCenterFactory> */
    use HasFactory;

    protected $fillable = ['name', 'location', 'description'];

    public function trainees()
    {
        return $this->hasMany(Trainee::class);
    }
}
