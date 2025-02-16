<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Program extends Component
{
    public function render()
    {
        return view('livewire.admin.program.index')
            ->extends('livewire.admin.app')
            ->section('content');
    }
}
