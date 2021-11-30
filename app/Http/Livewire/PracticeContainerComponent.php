<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Practice;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Foundation\Application;

class PracticeContainerComponent extends Component
{

    public string|int $days;
    public Collection $practices;

    final public function mount(): void
    {
        $this->days = 5;
        $this->getLastUpdates();
    }

    final public function render(): Factory|View|Application
    {
        return view('livewire.practice-container-component');
    }

    final public function onLastUpdates(): void
    {
        $this->getLastUpdates();
    }

    private function getLastUpdates(): void
    {
        $allPublished = Practice::allPublished();
        $lastUpdates = Practice::lastUpdates((int)$this->days);
        $this->practices = $allPublished->intersect($lastUpdates);
    }
}
