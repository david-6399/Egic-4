<?php

namespace App\Livewire\User\Components;

use App\Models\userFormation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToFavoris extends Component
{

    public $formationId;
    public $isFavorited = false;


    public function mount($formationId)
    {
        if (!$formationId) {
            abort(404, 'Formation not found');
        }

        $this->formationId = $formationId;
        $this->isFavorited = userFormation::where('user_id', Auth::id())
                        ->where('formation_id', $this->formationId)
                        ->exists();
    }


    public function addToFavoris(){
        if(!$this->isFavorited){
            if(auth()->check()){

                $user = auth()->user()->id;
                $formation = $this->formationId;
                userFormation::create([
                    'user_id' => $user,
                    'formation_id' => $formation
                ]);
                $this->dispatch('success');
            }else{
                return redirect()->route('login');
            }
        }else{
            dd('is already in the list');
        };

        $this->isFavorited = userFormation::where('user_id', Auth::id())
                        ->where('formation_id', $this->formationId)
                        ->exists();


    }

    public function render()
    {
        return view('livewire.user.components.add-to-favoris');
    }
}
