<?php

namespace App\Livewire;

use App\Models\Faq;
use Livewire\Component;

class FaqAccordion extends Component
{
    public string $search = '';

    public ?int $activeId = null;

    public function toggle(int $id): void
    {
        $this->activeId = ($this->activeId === $id) ? null : $id;
    }

    public function render()
    {
        $faqs = Faq::where('is_published', true)
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('pertanyaan', 'like', "%{$this->search}%")
                      ->orWhere('jawaban', 'like', "%{$this->search}%");
                });
            })
            ->orderByDesc('created_at')
            ->get();

        return view('livewire.faq-accordion', compact('faqs'));
    }
}
