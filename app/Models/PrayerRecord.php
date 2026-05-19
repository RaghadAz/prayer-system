<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrayerRecord extends Model
{

    use HasFactory;

    protected $fillable = [
        'student_id',
        'teacher_id',
        'date',
        'prayer_name',
        'status',
        'points',
    ];

    public function student()
    {
        return $this->belongsTo(StudentProfile::class);
    }

    public function teacher()
    {
        return $this->belongsTo(TeacherProfile::class);
    }
}
