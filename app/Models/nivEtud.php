<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nivEtud extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'niv_etuds' ;

    public function user(){
        return $this->hasMany(User::class, 'user_id' , 'id');
    }
}
