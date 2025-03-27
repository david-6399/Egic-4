<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable  
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'student',
        'admin',
        'user',
        'wtbs',
        'formation_subs_id',
        'formation_start',
        'formation_end',
        'age',
        'number',
        'created_by',
        'nivelEtud_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nivEtud(){
        return $this->belongsTo(nivEtud::class, 'user_id' , 'id');
    }

    public function comments(){
        return $this->hasMany(comment::class,'user_id' , 'id');
    }

    public function formations(){
        return $this->belongsToMany(formation::class, 'user_formations', 'user_id', 'formation_id');
    }

    public function events(){
        return $this->belongsToMany(event::class, 'user_events', 'user_id', 'event_id');
    }

    public function formation_sub(){
        return $this->belongsTo(formation::class, 'formation_subs_id', 'id');
    }

    public function referalToUser(){
        return $this->hasMany(referal::class, 'to_user', 'id');
    }

    public function referalFromStudent(){
        return $this->hasOne(referal::class, 'from_student', 'id');
    }
}
