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
        $this->days = session('practice.last_updated_days') ?? config('business.practice.last_updated_days');
        $this->practices = $this->originalPractices->intersect($this->getLastUpdated());
    }

    private function getLastUpdatesPublished(): void
    {
        $this->practices = $this->originalPractices->intersect($this->getLastUpdated());
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
        session()->put('practice.last_updated_days', $this->days);
        $this->getLastUpdatesPublished();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getLastUpdated(): Collection
    {
        return Practice::lastUpdates($this->days);
    }
}
