<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeFormation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    protected $table = 'type_formations';
}
