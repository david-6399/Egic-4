<?php

namespace App\Livewire\User;

use App\Models\event;
use App\Models\formation;
use App\Models\referal;
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
        $this->dispatch('done');
    }         

    public function addCodePromo(){
        $this->dispatch('addCodePromo');
    }

    public function codePromoAdded($test){
        $code = referal::select('referal_code')->get()->toArray();
        if(in_array($test, $code[0])){
            if(referal::where('referal_code', $test)->first()->to_user != null){
                $this->dispatch('alreadyUsed');
            }else{
                referal::where('referal_code', $test)->update([
                    'to_user' => auth()->user()->id,
                    'activated_at' => now(),
                    'time_used' => 1
                ]);
                $this->dispatch('done');
            }
        }
        else{
            $this->dispatch('failed');   
        }
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
