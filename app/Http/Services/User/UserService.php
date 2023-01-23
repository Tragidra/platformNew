<?php

namespace App\Http\Services\User;

use App\Models\CourseUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    /** @var User $user - текущий пользователь */
    private $user;

    const CONNECIONS_FIELDS = ['u.name', 'u.role_id', 'u.phone', 'p.profile_image',
        'p.about', 'p.age', 'cu.course_id', 'u.id'];

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Получить всех пользователей, связанных с текущим
     */
    public function getConnectionsForUser(): Collection
    {
        $currentCourses = CourseUser::where('user_id', $this->user['id'])->pluck('course_id')->toArray();

        $connections = User::from('users AS u')
            ->leftJoin('course_users AS cu', 'u.id', '=', 'cu.user_id')
            ->leftJoin('profiles AS p', 'u.id', '=', 'p.user_id')
            ->leftJoin('courses AS c', 'u.id', '=', 'c.default_teacher_id')
            ->whereIn('cu.course_id', $currentCourses)
            ->select(array_values(self::CONNECIONS_FIELDS))
            ->get();

        return $connections;
    }

    public function getRoles()
    {
        return Role::get();
    }
}
