<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'image'
    ];

    public function user() : User
    {
        return $this->belongsTo(User::class);
    }
}
