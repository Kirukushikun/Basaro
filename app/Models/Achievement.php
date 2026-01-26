<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'user_id',
        'lesson',
        'medal',
        'type',
        'count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
