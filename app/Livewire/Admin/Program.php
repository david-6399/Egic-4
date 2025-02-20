<?php

namespace App\Livewire\Admin;

use App\Models\formation;
use Livewire\Component;

class Program extends Component
{


    public function modal_programAndModule(){
        $this->dispatch('openModal');
    }

    public function render()
    {
        $formation = formation::with('programs')->get();
        return view('livewire.admin.program.index',[
            'formations' => $formation
        ])
            ->extends('livewire.admin.app')
            ->section('content');
    }
}
