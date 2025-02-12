<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    use HasFactory;

    protected $fillable =[
        'titre',
        'cod_program',
    ];

    public function program(){
        return $this->belongsTo(program::class, 'cod_program' , 'id');
    }

}
