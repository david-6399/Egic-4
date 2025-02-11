<?php

namespace App\Livewire\User;

use Livewire\Component;

class Event extends Component
{
    public function render()
    {
        return view('livewire.user.events.index')
                ->extends('livewire.user.index')
                ->section('content');
    }
}
