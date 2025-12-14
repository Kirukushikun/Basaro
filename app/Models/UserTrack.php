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

    /**
     * Get the user that owns the tracking record
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    /**
     * Get the percentage score
     */
    public function getPercentageAttribute()
    {
        if (!$this->lesson || $this->lesson->total_scores == 0) {
            return 0;
        }
        return round(($this->score / $this->lesson->total_scores) * 100, 1);
    }

    /**
     * Check if lesson is completed
     */
    public function isCompleted()
    {
        return $this->status === 'completed';
    }

    /**
     * Check if lesson is in progress
     */
    public function isInProgress()
    {
        return $this->status === 'in_progress';
    }
}
