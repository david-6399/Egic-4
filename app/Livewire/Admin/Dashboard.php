<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard')
                ->extends('livewire.admin.app')
                ->section('content');
    }
}
