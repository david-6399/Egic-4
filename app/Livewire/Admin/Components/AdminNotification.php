<?php
namespace App\Livewire\Admin\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminNotification extends Component
{
    public $unreadCount;
    
    public $notifications = [];

    

    public function mount()
    {
        $this->refrechComponent();
    }

    public function refrechComponent()
    {
        $user = Auth::user();
        $this->unreadCount = $user->unreadNotifications->count();
        $this->notifications = $user->notifications->take(5);
    }

    public function markAsRead($notificationId)
    {
        $user = Auth::user();
        $notification = $user->notifications->find($notificationId);
        if ($notification) {
            $notification->markAsRead();
        }

        $this->refrechComponent(); // Refresh UI after marking as read
    }

    public function render()
    {
        return view('livewire.admin.components.admin-notification');
    }
}

