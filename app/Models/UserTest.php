<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTest extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'answers',
        'score',
        'attempt',
        'is_first',
    ];

    protected $casts = [
        'answers'  => 'array',
        'is_first' => 'boolean',
    ];

    // -------------------------------------------------------
    // Relationships
    // -------------------------------------------------------

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // -------------------------------------------------------
    // Scopes
    // -------------------------------------------------------

    public function scopePretest($query)
    {
        return $query->where('type', 'pretest');
    }

    public function scopePosttest($query)
    {
        return $query->where('type', 'posttest');
    }

    public function scopeFirstAttempt($query)
    {
        return $query->where('is_first', true);
    }

    // -------------------------------------------------------
    // Helpers
    // -------------------------------------------------------

    /**
     * Get the first attempt for a user and test type.
     */
    public static function getFirstAttempt(int $userId, string $type): ?self
    {
        return static::where('user_id', $userId)
            ->where('type', $type)
            ->where('is_first', true)
            ->first();
    }

    /**
     * Get the next attempt number for a user and test type.
     */
    public static function nextAttemptNumber(int $userId, string $type): int
    {
        $last = static::where('user_id', $userId)
            ->where('type', $type)
            ->max('attempt');

        return ($last ?? 0) + 1;
    }

    /**
     * Check if a user has a first attempt on record.
     */
    public static function hasFirstAttempt(int $userId, string $type): bool
    {
        return static::where('user_id', $userId)
            ->where('type', $type)
            ->where('is_first', true)
            ->exists();
    }
}