<?php

namespace App\Livewire\Admin;

use App\Models\comment as ModelsComment;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class Comment extends Component
{

    public $perStatus = '';
    public $search = '';


    public function resetFiltter(){
        $this->perStatus = '';
        $this->search = '';
    }

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
        if(!$this->perStatus){
            $data = ModelsComment::where('contenu','like','%'.$this->search.'%')->get();
        }else{
            $data = ModelsComment::where('contenu','like','%'.$this->search.'%')->where('status','like',$this->perStatus)->get();
        }
        return view('livewire.admin.comment.index',[
            'comments' => $data 
        ])
            ->extends('livewire.admin.app')
            ->section('content');
    }
}
