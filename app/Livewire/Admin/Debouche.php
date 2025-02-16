<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Debouche extends Component
{
    public function render()
    {
        return view('livewire.admin.debouche.index')
                ->extends('livewire.admin.app')
                ->section('content');
    }
}
