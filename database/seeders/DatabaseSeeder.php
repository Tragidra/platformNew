<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Role;
use App\Models\Subject;
use Database\Factories\RoleFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Subject::factory(4)->create();
        Role::factory(1)->create(
            [
                'name' => 'Учитель',
            ]
        );
        Role::factory(1)->create(
            [
                'name' => 'Ученик',
            ]
        );
         \App\Models\User::factory(30)->create();
         Course::factory(5)->create();
         CourseUser::factory(16);
    }
}
