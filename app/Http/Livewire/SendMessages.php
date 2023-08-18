<?php

namespace App\Http\Livewire;

use App\Events\Messaging;
use Livewire\Component;

class SendMessages extends Component
{
    public function render()
    {
        
        return view('livewire.send-messages');
    }

    public function send($room) {
        Messaging::dispatch($room);
    }
}
