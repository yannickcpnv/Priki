<?php

namespace App\View\Components\Navigation;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PracticesLink extends Component
{

    private string $requestPath;

    public function __construct() { $this->requestPath = request()?->path(); }

    final public function render(): View
    {
        return view('components.navigation.practices-link');
    }

    final public function isAPracticeRoute(): bool { return $this->requestPath === 'practices'; }
}
