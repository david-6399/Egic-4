<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'duree',
        'tarif',
        'favoris',
        'image_path',
        'codTypeFormation',
    ];

    protected $table = 'formations';

    protected $primary = 'id';

    public function typeFormation(){
            return $this->belongsTo(typeFormation::class, 'codTypeFormation' , 'id');
    }

    public function programs(){
        return $this->hasMany(program::class, 'cod_formation' , 'id');
    }

    public function debouches(){
        return $this->hasMany(debouche::class, 'cod_formation' , 'id');
    }

    public function comments(){
        return $this->hasMany(comment::class, 'cod_formation' , 'id');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_formations', 'formation_id', 'user_id');
    }

}
