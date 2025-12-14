<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';

    protected $fillable = [
        'title',
        'description',
        'order',
        'type',
    ];

    public function userTrack()
    {
        return $this->hasOne(UserTrack::class, 'lesson_id')->where('user_id', auth()->id());
    }
}
