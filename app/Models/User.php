<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
public function teacherProfile()
{
    return $this->hasOne(\App\Models\TeacherProfile::class, 'user_id');
}

public function studentProfile()
{
    return $this->hasOne(\App\Models\StudentProfile::class, 'user_id');
}

}
