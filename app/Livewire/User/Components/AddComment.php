<?php

namespace App\Livewire\User\Components;

use App\Models\comment;
use App\Models\User;
use App\Notifications\sendNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Livewire\Component;

class AddComment extends Component
{
    public $contenu = '';
    
    public $formationId = '';
    public $eventId = '';

    public function mount($formationId, $eventId){
        $this->formationId = $formationId;
        $this->eventId = $eventId;
    }


    public function addComment(){
        if(!auth()->check()){
            return redirect()->route('login');
        }
        
        $this->validate([
            'contenu' => 'required|max:255|string'
        ]);

        $comment = comment::create([
            'contenu' => $this->contenu,
            'user_id' => auth()->user()->id,
            'formation_id' => $this->formationId,
            'event_id' => $this->eventId
        ]);
        $this->contenu = '';
        $this->dispatch('success');
        $admins = User::where('admin','1')->get();

        
        FacadesNotification::send($admins, new sendNotification($comment));
        
    }



    public function render()
    {
        return view('livewire.user.components.add-comment');
    }
}
