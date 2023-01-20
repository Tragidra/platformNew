<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'file_type',
        'comment',
        'user_id',
        'lesson_id'
    ];
}
