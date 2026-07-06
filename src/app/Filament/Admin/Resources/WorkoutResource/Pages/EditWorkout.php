<?php

namespace App\Filament\Admin\Resources\WorkoutResource\Pages;

use App\Filament\Admin\Resources\WorkoutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkout extends EditRecord
{
    protected static string $resource = WorkoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
