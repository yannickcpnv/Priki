<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Practice;
use Illuminate\Database\Eloquent\Collection;

class PracticeContainer extends Component
{

    public string|int $days;
    public Collection $practices;

    public function mount()
    {
        $this->days = 5;
        $this->getLastUpdates();
    }

    public function render()
    {
        return view('livewire.practice-container');
    }

    public function onLastUpdates()
    {
        $this->getLastUpdates();
    }

    private function getLastUpdates(): void
    {
        if (!intval($this->days)) {
            return;
        }

        $allPublished = Practice::allPublished();
        $lastUpdates = Practice::lastUpdates(intval($this->days));
        $this->practices = $allPublished->intersect($lastUpdates);
    }
}
