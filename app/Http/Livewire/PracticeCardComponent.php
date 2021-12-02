<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Practice;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use App\Exceptions\RequiredPropertyException;
use Illuminate\Contracts\Foundation\Application;

class PracticeCardComponent extends Component
{

    public Practice $practice;
    public string   $classes;

    /**
     * @throws \App\Exceptions\RequiredPropertyException
     */
    final public function mount(Practice $practice): void
    {
        if (!$practice->exists) {
            throw new RequiredPropertyException(Practice::class, 'practice', self::class);
        }

        $this->practice = $practice;
    }

    final public function render(): Factory|View|Application
    {
        return view('livewire.practice-card-component');
    }

    /**
     * Check if the domain of practices is selected.
     *
     * @return bool
     */
    final public function isDomainSelected(): bool
    {
        return session()->exists('domain');
    }
}
