<?php

namespace App\Livewire\User\Components;

use App\Models\event;
use App\Models\userEvent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubToEvent extends Component
{

    public $eventId ;
    public $alreadySub = false ;


    public function mount($eventId){
        $this->eventId = $eventId ;
        $this->alreadySub = userEvent::where('event_id', $this->eventId)
                            ->where('user_id', Auth::id())
                            ->exists();
    }

    public function subToEvent(){
        
        if(!$this->alreadySub ){
            if(auth()->check()){
                userEvent::create([
                    'event_id'=> $this->eventId,
                    'user_id'=> Auth()->user()->id
                ]);
                $this->dispatch('success');
            }else{
                return redirect()->route('login');
            }
        }else{
            dd('already Existe');
        }

        $this->alreadySub = userEvent::where('event_id', $this->eventId)
                        ->where('user_id', Auth::id())
                        ->exists();
    }


    public function render()
    {
        return view('livewire.user.components.sub-to-event');
    }
}
