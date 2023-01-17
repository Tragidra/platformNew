<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'start_date'=> $this->faker->date,
            'lessons_days' => '[1,2]',
            'subject_id' => Subject::query()->inRandomOrder()->first()->id,
            'default_teacher_id' => User::query()->where('role_id', 2)->inRandomOrder()->first()->id,
        ];
    }
}
