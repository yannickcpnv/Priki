<?php

namespace App\View\Components\Navigation;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ReferencesLink extends Component
{

    private string $requestPath;

    public function __construct() { $this->requestPath = request()?->path(); }

    final public function render(): View
    {
        return view('components.navigation.references-link', [
            'requestPath' => $this->requestPath,
        ]);
    }

    final public function isAReferenceRoute(): bool { return str_contains($this->requestPath, 'references'); }
}
