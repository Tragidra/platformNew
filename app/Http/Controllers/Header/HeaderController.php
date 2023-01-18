<?php

namespace App\Http\Controllers\Header;

use App\Http\Controllers\Controller;
use App\Models\CourseUser;
use App\Models\Lesson;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index(Request $request){
        $user = $request->user();

        $role_name = Role::query()->find($request->user()->role_id)->name;

        $profile = Profile::query()
            ->select('profile_image')
            ->where('user_id', $user->id)
            ->first('profile_image');

        $completed_courses = CourseUser::query()
            ->where('user_id', $user->id)
            ->where('completed', True)
            ->count();

        $completed_lessons = Lesson::query()
            ->leftJoin('course_users', 'course_users.course_id', '=', 'lessons.course_id')
            ->where('user_id', $user->id)
            ->where('date','<', Carbon::now())
            ->get()
            ->count();

        return [
            'status' => 'ok',
            'role_name' => $role_name,
            'profile_image' => $profile->profile_image,
            'completed_courses' => $completed_courses,
            'completed_lessons' => $completed_lessons
        ];
    }
}
