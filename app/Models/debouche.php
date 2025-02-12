<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class debouche extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cod_formation'
    ];

    protected $table = 'debouches' ;

    public function formation(){
        return $this->belongsTo(formation::class, 'cod_formation' , 'id');
    }
}
