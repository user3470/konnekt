<?php

namespace App\Http\Livewire\Provider;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.provider.dashboard')
            ->extends("layouts.app");
    }
}
