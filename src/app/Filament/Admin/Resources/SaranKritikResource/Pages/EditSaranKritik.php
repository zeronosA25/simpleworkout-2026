<?php

namespace App\Filament\Admin\Resources\SaranKritikResource\Pages;

use App\Filament\Admin\Resources\SaranKritikResource;
use App\Models\SaranKritik;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSaranKritik extends EditRecord
{
    protected static string $resource = SaranKritikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['status'] === 'Resolved') {
            $data['resolved_at'] = now();
        }

        return $data;
    }
}
