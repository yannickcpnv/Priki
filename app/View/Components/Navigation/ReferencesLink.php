<?php

namespace App\View\Components\Navigation;

use Illuminate\View\Component;

class ReferencesLink extends Component
{

    private string $requestPath;

    public function __construct() { $this->requestPath = request()?->path(); }

    public function render()
    {
        return view('components.navigation.references-link', [
            'requestPath' => $this->requestPath,
        ]);
    }

    public function isAReferenceRoute(): bool { return str_contains($this->requestPath, 'references'); }
}
