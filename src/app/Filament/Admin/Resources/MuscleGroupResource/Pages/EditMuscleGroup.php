<?php

namespace App\Filament\Admin\Resources\MuscleGroupResource\Pages;

use App\Filament\Admin\Resources\MuscleGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMuscleGroup extends EditRecord
{
    protected static string $resource = MuscleGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
