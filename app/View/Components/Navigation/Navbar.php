<?php

namespace App\View\Components\Navigation;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Navbar extends Component
{

    final public function render(): View { return view('components.navigation.navbar'); }
}
