<?php

namespace App\Livewire\Admin\Formations;

use Livewire\Component;

class Formation extends Component
{
    public function render()
    {
        return view('admin.formations.list')
                ->extends('admin.app')
                ->section('content');
    }
}
