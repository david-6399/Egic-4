<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\event;
use Illuminate\Http\Request;

class eventController extends Controller
{
    public function show($id){
        $event = event::find($id);

        $comment = comment::where('status', 'approved')->where('event_id',$id)->take(8)->get();
        return view('livewire.user.events.show',[
            'comments' => $comment,
            'events' => $event
        ]);
    }
}
