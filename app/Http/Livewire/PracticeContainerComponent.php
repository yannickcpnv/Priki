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
    public Collection $originalPractices;

    final public function mount(): void
    {
        $this->days = config('business.last_updated_days');
        $this->originalPractices = $this->practices;
    }

    final public function render(): Factory|View|Application
    {
        return view('livewire.practice-container-component');
    }

    /**
     * Event when the number of days is updated.
     */
    final public function onDaysUpdate(): void
    {
        $this->getLastUpdates();
    }

    private function getLastUpdates(): void
    {
        $lastUpdates = Practice::lastUpdates($this->days);
        $this->practices = $this->originalPractices->intersect($lastUpdates);
    }
}
