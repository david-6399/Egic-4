<?php

namespace App\Livewire\Admin\Formations;

use Livewire\Component;

class Formation extends Component
{
    public function render()
    {
        return view('livewire.admin.formations.index')
                ->extends('livewire.admin.app')
                ->section('content');
    }
}
