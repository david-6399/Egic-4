<?php

namespace App\Livewire\User;

use App\Models\event;
use App\Models\formation;
use App\Models\typeFormation;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{

    public function addNiveauEtude(){
        $this->dispatch('addNiveauEtude');
    }

    public function niveauAdded($test){
        $user = auth()->user()->id;
        User::where('id', $user)->update(['nivelEtud_id' => $test]);
        $this->dispatch('success');
    }         


    public function render()
    {
        $formations = formation::latest()->take(4)->get();
        $events = event::latest()->take(4)->get();
        $types = typeFormation::latest()->take(6)->get();

        return view('livewire.user.home',[
            'formations' => $formations,
            'events' => $events,
            'types' => $types
        ])
                ->extends('livewire.user.index')
                ->section('content');
    }
}
