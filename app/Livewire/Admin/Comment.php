<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Comment extends Component
{
    public function render()
    {
        return view('livewire.admin.comment.index')
            ->extends('livewire.admin.app')
            ->section('content');
    }
}
