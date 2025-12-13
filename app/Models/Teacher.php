<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    protected $table = 'teachers';

    protected $fillable = [
        'is_disabled',
        'role',
        'name',
        'email',
        'password',
        'is_disabled',
    ];

    protected $hidden = [
        'password',
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

}
