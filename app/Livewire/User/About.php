<?php

namespace App\Livewire\User;

use App\Models\comment;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        $data = comment::where('status', 'approved')->take(8)->get();
        
        return view('livewire.user.about',[
            'comments' => $data
        ])
                ->extends('livewire.user.index')
                ->section('content');
    }
}
