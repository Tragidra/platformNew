<?php

namespace App\Http\Controllers\Homework;


use App\Http\Services\Homework\HomeworkService;
use Illuminate\Http\Request;

class HomeworkController
{
    const TEACHER_ROLE = 1;
    const STUDENT_ROLE = 2;
    public function index(Request $request)
    {
        $role = $request->user()['role_id'];

        $courseList = [];
        $service = new HomeworkService($request->user()['id']);

        switch ($role) {
            case self::TEACHER_ROLE:
                $courseList = $service->getCoursesListForTeacher();
                break;
            case self::STUDENT_ROLE:
                $courseList = $service->getCoursesListForStudent();
                break;
            default:
                return [
                  'status' => 'error',
                  'message' => 'Роль не определена'
                ];
        }
    }

}
