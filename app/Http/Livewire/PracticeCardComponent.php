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
    public bool     $withDomain = false;
    public bool     $withState  = false;

    /**
     * @throws RequiredPropertyException
     */
    final public function mount(Practice $practice): void
    {
        if (!$practice->exists) {
            throw new RequiredPropertyException(
                Practice::class,
                'practice',
                self::class
            );
        }
    }

    final public function render(): Factory|View|Application
    {
        return view('livewire.practice-card');
    }
}
