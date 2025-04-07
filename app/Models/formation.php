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
        'typeFormation_id',
    ];

    protected $table = 'formations';

    protected $primary = 'id';

    public function typeFormation(){
            return $this->belongsTo(typeFormation::class, 'typeFormation_id' , 'id');
    }

    public function programs(){
        return $this->hasMany(program::class, 'formation_id' , 'id');
    }

    public function debouches(){
        return $this->hasMany(debouche::class, 'formation_id' , 'id');
    }

    public function comments(){
        return $this->hasMany(comment::class, 'formation_id' , 'id');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_formations', 'formation_id', 'user_id');
    }

    public function user_sub(){
        return $this->hasMany(User::class, 'formation_subs_id', 'id');
    }

    public function nivEtuds(){
        return $this->belongsToMany(nivEtud::class, 'formation_niv_etuds', 'formation_id', 'nivEtud_id');
    }
}
