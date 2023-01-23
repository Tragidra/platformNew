<?php

namespace App\Http\Services\Homework;

use App\Models\Course;

class HomeworkService
{
    private $user_id;
    public function __construct(int $user_id)
    {
        $this->user_id = $user_id;
    }
    public function getCoursesListForTeacher()
    {

        return '';
    }

    public function getCoursesListForStudent()
    {
        return '';
    }

    public function getLessonsList()
    {
        //TODO
    }

}
