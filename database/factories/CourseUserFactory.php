<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::query()->where('role_id', 1)->inRandomOrder()->first()->id,
            'course_id' => Course::query()->inRandomOrder()->first()->id,
        ];
    }
}
