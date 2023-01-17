<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseCountroller extends Controller
{
    public function getMyCourses(Request $request){
        $user = 6;
        $coures = CourseUser::query()
            ->leftJoin('courses', 'courses.id', '=', 'course_users.course_id')
            ->leftJoin('subjects', 'courses.subject_id','=', 'subjects.id')
            ->leftJoin('users', 'users.id', '=', 'courses.default_teacher_id')
            ->where('course_users.user_id', '=', $user)
            ->get();

        return $coures;
    }
}
