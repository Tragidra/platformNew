<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_number',
        'lesson_recording',
        'date',
        'subject_material_id',
        'course_id',
        'substitute_teacher_id',
        'homework_id'
    ];
}
