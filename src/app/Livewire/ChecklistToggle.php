<?php

namespace App\Livewire;

use App\Models\JadwalPengguna;
use Livewire\Component;

class ChecklistToggle extends Component
{
    public int $hariJadwalId;
    public bool $isChecked;

    public function mount(int $hariJadwalId, bool $isChecked = false): void
    {
        $this->hariJadwalId = $hariJadwalId;
        $this->isChecked = $isChecked;
    }

    public function toggle(): void
    {
        $user = auth()->user();

        $existing = JadwalPengguna::where('user_id', $user->id)
            ->where('hari_jadwal_id', $this->hariJadwalId)
            ->first();

        if ($existing) {
            $existing->delete();
            $this->isChecked = false;
        } else {
            JadwalPengguna::create([
                'user_id' => $user->id,
                'hari_jadwal_id' => $this->hariJadwalId,
                'is_checked' => true,
                'checked_at' => now(),
            ]);
            $this->isChecked = true;
        }
    }

    public function render()
    {
        return view('livewire.checklist-toggle');
    }
}
