<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Equipment extends Model
{
    protected $table = 'equipment';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function workouts(): BelongsToMany
    {
        return $this->belongsToMany(
            Workout::class,
            'workout_equipment',
            'equipment_id',
            'workout_id'
        );
    }
}
