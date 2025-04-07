<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formation_nivEtud extends Model
{
    use HasFactory;

    protected $fillable = [
        'formation_id',
        'nivEtud_id',
    ];
    protected $table = 'formation_niv_etuds' ;
}
