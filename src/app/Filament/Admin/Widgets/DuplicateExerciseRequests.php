<?php

namespace App\Filament\Admin\Widgets;

use App\Models\SaranKritik;
use Carbon\Carbon;
use Filament\Widgets\Widget;

class DuplicateExerciseRequests extends Widget
{
    protected static ?int $sort = 5;

    protected static string $view = 'filament.admin.widgets.duplicate-exercise-requests';

    public function getDuplicates(): array
    {
        $oneWeekAgo = Carbon::now()->subWeek();

        $all = SaranKritik::where('kategori', 'Saran Gerakan Baru')
            ->where('created_at', '>=', $oneWeekAgo)
            ->pluck('pesan');

        $grouped = $all->groupBy(function ($item) {
            return mb_strtolower(trim($item));
        });

        $duplicates = [];

        foreach ($grouped as $text => $items) {
            if ($items->count() >= 3) {
                $duplicates[] = [
                    'text' => $text,
                    'count' => $items->count(),
                ];
            }
        }

        return $duplicates;
    }

    public function hasDuplicates(): bool
    {
        return count($this->getDuplicates()) > 0;
    }

    protected function getViewData(): array
    {
        return [
            'duplicates' => $this->getDuplicates(),
            'hasDuplicates' => $this->hasDuplicates(),
        ];
    }
}
