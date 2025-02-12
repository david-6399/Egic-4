<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    use HasFactory;

    protected $fillable =[
        'titre',
        'cod_formation',
    ];

    protected $table = 'programs';


    public function formation(){
        return $this->belongsTo(formation::class, 'cod_formation' , 'id');
    }
    public function module(){
        return $this->hasOne(module::class, 'cod_program' , 'id');
    }
}
