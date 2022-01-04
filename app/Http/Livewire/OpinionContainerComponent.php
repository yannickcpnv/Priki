<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Practice;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Foundation\Application;

class OpinionContainerComponent extends Component
{

    public Practice   $practice;
    public Collection $opinions;

    public function render(): Factory|View|Application
    {
        return view('livewire.opinion-container-component');
    }
}
