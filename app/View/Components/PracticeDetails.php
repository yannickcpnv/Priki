<?php

namespace App\View\Components;

use App\Models\Practice;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PracticeDetails extends Component
{

    public Practice $practice;

    public function __construct(Practice $practice)
    {
        $this->practice = $practice;
    }

    public function render(): View
    {
        return view('components.practice-details');
    }
}
