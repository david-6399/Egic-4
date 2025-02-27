<?php

namespace App\Http\Controllers;

use App\Models\formation;
use Illuminate\Http\Request;

class formationContoller extends Controller
{
    public function show($id){
        $formation = formation::with('programs.module')->findOrFail($id);
        // dd($formation);
        return view('livewire.user.formation.show',[
            'formations' => $formation
        ]);
    }
}
