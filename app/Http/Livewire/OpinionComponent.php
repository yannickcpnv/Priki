<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Opinion;
use App\Models\Practice;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class OpinionComponent extends Component
{

    public Opinion  $opinion;
    public Practice $practice;

    public function render(): Factory|View|Application
    {
        return view('livewire.opinion-component');
    }

    public function voteUp(): void
    {
        $this->opinion->increasePoints(Auth::user());
        $this->opinion = $this->opinion->refresh();
    }

    public function voteDown(): void
    {
        $this->opinion->decreasePoints(Auth::user());
        $this->opinion = $this->opinion->refresh();
    }
}
