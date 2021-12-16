<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Opinion;
use Illuminate\Contracts\View\View;

class OpinionComponent extends Component
{

    public Opinion $opinion;

    public function render(): View
    {
        return view('livewire.opinion-component');
    }
}
