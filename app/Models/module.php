<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'coefficient',
        'program_id',
        'document'
    ];

    public function program(){
        return $this->belongsTo(program::class, 'program_id' , 'id');
    }

}
