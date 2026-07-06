<?php

namespace App\Filament\Admin\Resources\TemplateJadwalResource\Pages;

use App\Filament\Admin\Resources\TemplateJadwalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTemplateJadwal extends ListRecords
{
    protected static string $resource = TemplateJadwalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
