<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nivEtud extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    protected $table = 'niv_etuds' ;

    public function user(){
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }
}
