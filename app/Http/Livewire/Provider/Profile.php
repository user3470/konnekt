<?php

namespace App\Http\Livewire\Provider;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;

    public function updatedEmail(){
        
    }

    public $listeners = ['saveProfile'];

    public function render()
    {
        return view('livewire.provider.profile');
    }

    public function saveProfile($profile)
    {
        //validate
        try {
            $user = User::create([
                'email' => $this->email,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'gender' => $profile['gender'],
                'dob' => $profile['dob'],
                'avatar' => session('profile_image', ''),
                'area' =>  $profile['area'],
                'city' =>  $profile['city'],
                'state' =>  $profile['state'],
                'password' =>  Hash::make($this->password)
            ]);
            Auth::login($user, true);
            return redirect(route('profile'));
        } catch (\Throwable $th) {
            $this->emit('saving_error', $th->getMessage());
        }
        
    }
}
