<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class debouche extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'formation_id'
    ];

    protected $table = 'debouches' ;

    public function formation(){
        return $this->belongsTo(formation::class, 'formation_id' , 'id');
    }
}
