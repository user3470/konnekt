<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ServiceProvider extends Component
{
    public function render()
    {
        return view('livewire.service-provider')
            ->extends('layouts.create');
    }
}
