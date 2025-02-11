<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'formation_name',
        'duree',
        'tarif',
        'favoris',
        'image_path',
        'cod_typeformation',
        'cod_program',
    ];

    protected $table = 'formations';

    protected $primary = 'id';
}
