<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memoire extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'auteur',
        'date_de_présanté',
        'visitor',
        'memoire'
    ];

    protected $table = 'memoires';
}
