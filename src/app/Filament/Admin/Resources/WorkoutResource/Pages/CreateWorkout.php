<?php

namespace App\Filament\Admin\Resources\WorkoutResource\Pages;

use App\Filament\Admin\Resources\WorkoutResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWorkout extends CreateRecord
{
    protected static string $resource = WorkoutResource::class;
}
