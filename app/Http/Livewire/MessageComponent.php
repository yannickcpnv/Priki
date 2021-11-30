<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class MessageComponent extends Component
{

    public string $message;
    public string $messageType;

    final public function mount(string $message, string $messageType): void
    {
        $this->message = $message;
        $this->messageType = $messageType;
    }

    final public function render(): Factory|View|Application
    {
        return view('livewire.message-component');
    }
}
