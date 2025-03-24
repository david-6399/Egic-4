<?php

namespace App\Livewire\Admin;

use App\Models\formation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Student extends Component
{
    use WithPagination ;

    public $paginationTheme = 'bootstrap';

    public $userInfo = [] ;
    
    public $newUser = [
        'created_by' => 'ecole',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
        'admin' => 0,
        'user' => 1,
        'student' => 0,
        'wtbs' => 0,
    ] ;

    public $search = '' ;

    public $perUserStatus = null ;

    public function userProfile($id){

        $this->userInfo = User::with('formation_sub')->find($id)->toArray();
        
    }

    public function saveUserInfo(){
        $userData = $this->validate([
            'userInfo.name' => 'required',
            'userInfo.email' => 'required|email',
            'userInfo.student' => 'required|boolean',
            'userInfo.admin' => 'required|boolean',
            'userInfo.user' => 'required|boolean',
            'userInfo.wtbs' => 'required|boolean',
            'userInfo.formation_subs_id' => 'nullable|exists:formations,id',
            'userInfo.formation_start' => 'nullable|date',
            'userInfo.formation_end' => 'nullable|date',
            'userInfo.age' => 'nullable|numeric',
            'userInfo.number' => 'nullable|numeric',
            'userInfo.created_by' => 'required',
        ]);
        User::where('id',$this->userInfo['id'])->update($userData['userInfo']);

        if($this->userInfo['formation_subs_id']){
            User::where('id',$this->userInfo['id'])->update([
                'wtbs' => 0 ,
                'student' => 1
            ]);
        }
        
        $this->dispatch('test');
    }

    public function switchToCreatePage(){
        $this->dispatch('switchToCreate');
    }

    public function closeModal(){
        $this->dispatch('closeModal');
        $this->newUser = [
            'created_by' => 'ecole',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' //password
        ];
    }

    public function createUser(){
        
        $data = $this->validate([
           'newUser.name' => 'required',
           'newUser.email' => 'required|email',
           'newUser.student' => 'required|boolean',
           'newUser.admin' => 'required|boolean',
           'newUser.user' => 'required|boolean',
           'newUser.wtbs' => 'required|boolean',
           'newUser.formation_subs_id' => 'nullable|exists:formations,id',
           'newUser.formation_start' => 'nullable|date',
           'newUser.formation_end' => 'nullable|date',
           'newUser.age' => 'nullable|numeric',
           'newUser.number' => 'nullable|numeric',
           'newUser.created_by' => 'required',
       ]);
        
        User::create($this->newUser);
        
        $this->newUser = [
            'created_by' => 'ecole',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'admin' => 0,
            'user' => 1,
            'student' => 0,
            'wtbs' => 0,
        ] ;

    }



    public function render()
    {   
        if($this->perUserStatus === '0'){
            $data = User::where('name','like' ,'%'.$this->search.'%')->where('formation_subs_id', null)->paginate(10);
        }
        elseif($this->perUserStatus === '1'){
            $data = User::where('name','like' ,'%'.$this->search.'%')->whereNotNull('formation_subs_id')->paginate(10);
        }
        else{
            $data = User::where('name','like' ,'%'.$this->search.'%')->paginate(10);
        }

        $formation = formation::get();
        return view('livewire.admin.student.index',[
            'users' => $data,
            'formations' => $formation
        ])
                ->extends('livewire.admin.app')
                ->section('content');
    }
}
