<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'event_start',
        'event_end',
        'abonement',
        'image_path',
    ];

    // protected $casts = [
    //     'event_start' => 'datetime:Y-m-d',
    //     'event_end' => 'datetime:Y-m-d',
    // ];

    public function comments(){
        return $this->hasMany(comment::class, 'cod_event' , 'id');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_events', 'event_id', 'user_id');
    }
}
