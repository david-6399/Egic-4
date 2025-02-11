<?php

namespace App\Livewire\User;

use Livewire\Component;

class MyCart extends Component
{
    public function render()
    {
        return view('livewire.user.myCart')
                ->extends('livewire.user.index')
                ->section('content');
    }
}
