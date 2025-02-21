<?php

namespace App\Livewire\Admin;

use App\Models\comment as ModelsComment;
use Livewire\Component;

class Comment extends Component
{

    public $perStatus = '';


    public function switchToApprove($id){
        ModelsComment::find($id)->update([
            'status' => 'approved'
        ]);
    }

    public function switchToNotApprove($id){
        ModelsComment::find($id)->update([
            'status' => 'notApproved'
        ]);
    }


    public function render()
    {
        $data = ModelsComment::where('status','like','%'.$this->perStatus.'%')->get();
        return view('livewire.admin.comment.index',[
            'comments' => $data 
        ])
            ->extends('livewire.admin.app')
            ->section('content');
    }
}
