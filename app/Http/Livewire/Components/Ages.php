<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Ages extends Component
{
    public $between;
    public function render()
    {
        return view('livewire.components.ages');
    }

    public function mount($between = null){
        $this->between = $between;
    }
}
