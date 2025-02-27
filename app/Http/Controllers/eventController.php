<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;

class eventController extends Controller
{
    public function show($id){
        $event = event::find($id);

        return view('livewire.user.events.show',[
            'events' => $event
        ]);
    }
}
