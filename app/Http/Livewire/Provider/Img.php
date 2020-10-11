<?php

namespace App\Http\Livewire\Provider;

use Livewire\Component;
use Livewire\WithFileUploads;

class Img extends Component
{
    use WithFileUploads;

    public $image;

    public $listeners = ['saveImage'];

    public function render()
    {
        return view('livewire.provider.img');
    }

    public function saveImage(){
        if(!isset($this->image)) return;
        session(['profile_image' => $this->image->store('profiles')]);
    }
}
