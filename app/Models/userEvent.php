<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userEvent extends Model
{
    use HasFactory;

    protected $table = 'user_events';

    protected $fillable = [
        'user_id',
        'event_id',
    ];
}
