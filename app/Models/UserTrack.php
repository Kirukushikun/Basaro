<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;

class UserTrack extends Model
{
    protected $table = 'user_track';

    protected $fillable = [
        'user_id',
        'lesson_id',
        'status',
        'score',
        'attempts',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
