<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referal extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_student',
        'to_user',
        'time_used',
        'referal_code'
    ];

    protected $table = 'referals';

    public function studentReferal(){
        return $this->belongsTo(User::class, 'from_student','id');
    }

    public function userReferal(){
        return $this->belongsToMany(User::class, 'to_user', 'id');
    }
}
