<?php

namespace App\Livewire;

use App\Models\Workout;
use Livewire\Component;

class WorkoutNavigator extends Component
{
    public int $currentId;

    public int $muscleGroupId;

    public ?array $prev = null;

    public ?array $next = null;

    public function mount(int $currentId, int $muscleGroupId): void
    {
        $this->currentId = $currentId;
        $this->muscleGroupId = $muscleGroupId;
        $this->loadAdjacent();
    }

    private function loadAdjacent(): void
    {
        $ids = Workout::where('muscle_group_id', $this->muscleGroupId)
            ->where('is_published', true)
            ->orderBy('title')
            ->pluck('id')
            ->values();

        $index = $ids->search($this->currentId);

        if ($index === false) return;

        if ($index > 0) {
            $prev = Workout::find($ids[$index - 1]);
            $this->prev = ['title' => $prev->title, 'slug' => $prev->slug];
        }

        if ($index < $ids->count() - 1) {
            $next = Workout::find($ids[$index + 1]);
            $this->next = ['title' => $next->title, 'slug' => $next->slug];
        }
    }

    public function render()
    {
        return view('livewire.workout-navigator');
    }
}
