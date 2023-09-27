<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RoomCard extends Component
{
    public $title;
    public $description;
    public $room_id;
    public function render()
    {
        return view('livewire.room-card');
    }
}
