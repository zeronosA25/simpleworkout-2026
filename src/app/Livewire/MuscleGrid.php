<?php

namespace App\Livewire;

use App\Models\MuscleGroup;
use App\Models\Workout;
use Livewire\Component;

class MuscleGrid extends Component
{
    public string $slug;

    public string $filter = 'all';

    public function setFilter(string $type): void
    {
        $this->filter = $type;
    }

    public function render()
    {
        $muscle = MuscleGroup::where('slug', $this->slug)
            ->where('status', true)
            ->firstOrFail();

        $workouts = Workout::where('muscle_group_id', $muscle->id)
            ->where('is_published', true)
            ->when($this->filter !== 'all', function ($query) {
                $query->where('type', $this->filter);
            })
            ->orderBy('title')
            ->get();

        return view('livewire.muscle-grid', compact('muscle', 'workouts'));
    }
}
