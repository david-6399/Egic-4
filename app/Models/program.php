<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    use HasFactory;

    protected $fillable =[
        'titre',
        'formation_id',
    ];

    protected $table = 'programs';


    public function formation(){
        return $this->belongsTo(formation::class, 'formation_id' , 'id');
    }
    
    public function module(){
        return $this->hasOne(module::class, 'program_id' , 'id');
    }
}
