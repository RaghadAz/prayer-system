<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyProgramAnswer extends Model
{

    protected $fillable = [
        'student_id',
        'date',
        'question_id',
        'answer_text',
        'points',
        'set_name',
    ];}
