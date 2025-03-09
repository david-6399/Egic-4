<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notification extends Component
{
    public function render()
    {
        $data = Auth::user()->notifications ;
        return view('livewire.admin.notification.list',[
            'notifications' => $data
        ])
                ->extends('livewire.admin.app')
                ->section('content');
    }
}
