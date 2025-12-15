<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Note;
use App\Models\UserTrack;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'current_lesson',
        'current_progress',
        'grade_level',
        'teacher_id',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'current_lesson' => 'integer',
        'last_login_at' => 'datetime',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function trackings()
    {
        return $this->hasMany(UserTrack::class);
    }

    /**
     * Get the teacher assigned to this student
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }


    // /**
    //  * Get completed lesson trackings
    //  */
    // public function completedLessons()
    // {
    //     return $this->hasMany(UserTrack::class)->where('status', 'completed');
    // }

    // /**
    //  * Get in-progress lesson trackings
    //  */
    // public function inProgressLessons()
    // {
    //     return $this->hasMany(UserTrack::class)->where('status', 'in_progress');
    // }

    // /**
    //  * Get the current lesson (highest lesson_id)
    //  */
    // public function getCurrentLessonAttribute()
    // {
    //     return $this->trackings()->max('lesson_id') ?? 0;
    // }

    // /**
    //  * Get average score percentage
    //  */
    // public function getAverageScoreAttribute()
    // {
    //     $completed = $this->completedLessons()->with('lesson')->get();
        
    //     if ($completed->isEmpty()) {
    //         return 0;
    //     }

    //     return round(
    //         $completed->avg(function ($track) {
    //             if (!$track->lesson || $track->lesson->total_scores == 0) {
    //                 return 0;
    //             }
    //             return ($track->score / $track->lesson->total_scores) * 100;
    //         }),
    //         1
    //     );
    // }
}
