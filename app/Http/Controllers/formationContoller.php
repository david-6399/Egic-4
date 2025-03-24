<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\formation;
use Illuminate\Http\Request;

class formationContoller extends Controller
{
    public function show($id){
        $formation = formation::with('programs.module')->findOrFail($id);
        
        $comment = comment::where('status', 'approved')->where('formation_id',$id)->take(8)->get();

        return view('livewire.user.formation.show',[
            'comments' => $comment,
            'formations' => $formation
        ]);
    }
}
