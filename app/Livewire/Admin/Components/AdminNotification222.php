<?php

namespace App\Livewire\Admin\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminNotification222 extends Component
{
    public $counter ;

    public $notifications = [];

    public function mount(){
        $this->refrech();
    }

    public function refrech(){
        $this->counter = auth()->user()->unreadNotifications->count();
        $this->notifications = Auth::user()->notifications->take(4);
    }

    public function markAsRead($notificationId){
        // dd($notificationId);
        auth()->user()->notifications->find($notificationId)->markAsRead();
        $this->refrech();
    }



    public function render()
    {
        return view('livewire.admin.components.admin-notification222');
    }
}
