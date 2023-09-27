<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Nav extends Component
{
    public $color;
    public $position;
    
    public function render()
    {
        return view('livewire.nav');
    }
}
