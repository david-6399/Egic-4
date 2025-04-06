<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class MyCart extends Component
{


    public function removeFromCart($id){
        $user = User::find(auth()->user()->id);
        $user->formations()->detach($id);
    }

    public function render()
    {
        $data = user::where('id', auth()->user()->id)->with('formations')->first();
        
        return view('livewire.user.mycart',[
            'data' => $data
        ])
                ->extends('livewire.user.index')
                ->section('content');
    }
}
