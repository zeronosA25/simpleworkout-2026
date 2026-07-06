<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MuscleGroup extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon_path',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function workouts(): HasMany
    {
        return $this->hasMany(Workout::class);
    }
}
