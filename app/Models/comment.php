<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'user_id',
        'formation_id',
        'event_id',
    ];

    protected $table = 'comments';

    public function user(){
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }

    public function formation(){
        return $this->belongsTo(formation::class, 'formation_id' , 'id');
    }

    public function event(){
        return $this->belongsTo(event::class, 'event_id', 'id');
    }
}
