<?php

namespace App\View\Components\Navigation;

use Illuminate\View\Component;

class PracticesLink extends Component
{

    private string $requestPath;

    public function __construct() { $this->requestPath = request()?->path(); }

    public function render()
    {
        return view('components.navigation.practices-link');
    }

    public function isAPracticeRoute(): bool { return str_contains($this->requestPath, 'references'); }
}
