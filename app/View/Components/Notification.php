<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Notification extends Component
{

    public string $message;
    public string $type;

    public function __construct(string $message, string $type)
    {
        $this->message = $message;
        $this->type = $type;
    }

    final public function render(): View { return view('components.notification'); }

    final public function getTypeClass(): string
    {
        return match ($this->type) {
            default => "is-$this->type",
            'error' => 'is-danger',
            'basic' => '',
        };
    }
}
