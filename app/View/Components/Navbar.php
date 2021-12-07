<?php

namespace App\View\Components;

use Closure;
use App\Models\Domain;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Foundation\Application;

class Navbar extends Component
{

    public function render(): View|Factory|Htmlable|Closure|string|Application
    {
        return view('components.navbar', [
            'domains' => Domain::allWithPracticePublishedCount(),
        ]);
    }
}
