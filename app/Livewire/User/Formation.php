<?php

namespace App\Livewire\User;

use Livewire\Component;

class Formation extends Component
{
    public function render()
    {
        return view('livewire.user.formation.index')
                ->extends('livewire.user.index')
                ->section('content');
    }
}
