<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class OpinionsContainer extends Component
{

    public Collection $opinions;

    public function __construct(Collection $opinions)
    {
        $this->opinions = $opinions;
    }

    public function render()
    {
        return view('components.opinions-container');
    }
}
