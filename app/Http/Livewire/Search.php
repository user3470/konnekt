<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Search extends Component
{
    public $currency;
    
    public $address;

    public $amount;

    public function updatedCurrency(){
        try {
            $response = Http::post(env('GET_ADDRESS_URL'), ['currency' => $this->currency, 'uid' => rand(1, 500)]);
            if($response->status() !== 200) return $this->emit("address.error", 'Failed to get address');
            $data = $response->json();
            if(!isset($data['address']) || !isset($data['amount'])) return $this->emit('address.params_error', "Missing parameters. Try again later");
            $this->address = $data['address'];
            $this->amount = $data['amount'];
            $this->emit("qr-modal", true);

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }

    }

    // public function qrgen(){
    //     return QrCode::size(500)->format('png')->BTC('address', 0.0034, [
    //         'label' => 'my label',
    //         'message' => 'my message',
    //         'returnAddress' => 'https://www.returnaddress.com'
    //     ]);
    // }

    public function render()
    {
        return view('livewire.search')
            ->extends('layouts.app');
    }

    public function requestContacts($provider){
        $this->currency = null;
        $this->address = null;
        $this->emit("qr-modal");
    }

    public function checkPayment(){
        
    }

    public function filter(){
        return redirect(route('find'));
    }
}
