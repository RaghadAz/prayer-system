<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
protected $fillable = ['user_id','teacher_id'];
    public function user(){
        return $this->belongsTo(User::class);

        }
public function prayerRecords()
{
    return $this->hasMany(DailyProgramAnswer::class, 'student_id','id');
}
public function teacher()
{
    return $this->belongsTo(TeacherProfile::class, 'teacher_id');
}


    }
