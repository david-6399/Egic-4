<?php

namespace App\Livewire\User\Components;

use App\Models\User;
use App\Notifications\becomStudent;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class BecomeStudent extends Component
{
    public function becomeStudent($id)
    {
        if (User::where('id', $id)->whereNotNull('email_verified_at')->exists()) {
            User::where('id', $id)->update([
                'user' => 0,
                'admin' => 0,
                'student' => 0,
                'wtbs' => 1,
            ]);
            return redirect()->route('home')->with('success', 'You are now a student');
        } else {
            $this->skipRender(); 
            return $this->dispatch('verifyEmail');
        }

        $user = User::find($id);
        $admins = User::where('admin', 1)->get();
        Notification::send($admins, new becomStudent($user));
    }

    public function goToVerifyEmail()
    {
        return redirect()->route('verification.notice');
    }

    public function render()
    {
        return view('livewire.user.components.become-student');
    }
}
