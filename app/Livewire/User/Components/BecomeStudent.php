<?php

namespace App\Livewire\User\Components;

use App\Models\User;
use App\Notifications\becomStudent;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class BecomeStudent extends Component
{

    public function becomeStudent($id){
        $user = User::where('id',$id)->first();
        if($user->email_verified_at != null){
            User::where('id',$id)->update([
                'user'=>0,
                'admin' => 0,
                'student' => 0,
                'wtbs' => 1
            ]);
        }else{
            session()->flash('error','Please verify your email first');
            return redirect()->route('verification.notice');
        }

        $user = User::find($id);
        $admins = User::where('admin',1)->get();
        Notification::send($admins, new becomStudent($user));
    }


    public function render()
    {
        return view('livewire.user.components.become-student');
    }
}
