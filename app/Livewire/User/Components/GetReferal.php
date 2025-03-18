<?php

namespace App\Livewire\User\Components;

use App\Models\referal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GetReferal extends Component
{

    public $referalCode = '';

    public $alreadyExists = [] ;

    public $user_id = '';

    public function mount(){
        if(Auth::check()){
            $this->user_id = auth()->user()->id ;
            $this->alreadyExists = referal::where('from_student',$this->user_id)->get()->toArray();
        }   
        
    }

    public function generateReferalCode(){
        
        $this->dispatch('hello');
        
        if($this->alreadyExists != []){
            $this->referalCode = $this->alreadyExists[0]['referal_code'];
        }
        else{
            $code = generateReferal($this->user_id, 7);
            $this->referalCode = $code;
            referal::create([
                'from_student' => auth()->user()->id,
                'referal_code' => $this->referalCode
            ]);
        }
        $this->mount();

    }


    // public function saveReferalCode(){
       
    //     referal::create([
    //         'from_student' => auth()->user()->id,
    //         'referal_code' => $this->referalCode
    //     ]);
    // }

    public function render()
    {

        return view('livewire.user.components.get_referal');
    }
}
