<?php

namespace App\Livewire\User;

use App\Models\event as ModelsEvent;
use Livewire\Component;
use Livewire\WithPagination;

class Event extends Component
{
    use WithPagination;

    public $paginationTheme = 'bootstrap';


    public function openEvent($id){
        return redirect()->route('event.show',[$id]);
    }


    public function render()
    {
        $data = ModelsEvent::paginate(6);
        return view('livewire.user.events.index',[
            'events' => $data
        ])
                ->extends('livewire.user.index')
                ->section('content');
    }
}
