<?php

namespace App\View\Components;

use App\Models\Domain;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Navbar extends Component
{

    public function render(): View
    {
        return view('components.navbar', [
            'domains' => Domain::allWithPracticePublishedCount(),
        ]);
    }
}
