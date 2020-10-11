<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Find extends Component
{
    public $area;

    public function render()
    {
        return view('livewire.find')
            ->extends('layouts.create');
    }

    public function search($search){
        // dd($search);
        session(['find' => json_encode($search)]);
        return redirect(route('search'));
    }
}
