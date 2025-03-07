<?php

namespace App\Livewire\User\Components;

use App\Models\User;
use App\Notifications\becomStudent;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class BecomeStudent extends Component
{

    public function becomeStudent($id){
        $user = User::where('id',$id)->update([
            'user'=>0,
            'admin' => 1,
            'student' => 0,
            'wtbs' => 1
        ]);
        $admins = User::where('admin',1)->get();
        Notification::send($admins, new becomStudent($user));
    }


    public function render()
    {
        return view('livewire.user.components.become-student');
    }
}
