<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\HomeWork;
use App\Models\Subject;
use App\Models\SubjectMaterial;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lesson_number' => random_int(1,10),
            'lesson_recording' => $this->faker->url,
            'date' => $this->faker->dateTime,
            'subject_material_id' => SubjectMaterial::query()->inRandomOrder()->first()->id,
            'course_id' => Course::query()->inRandomOrder()->first()->id,
            'substitute_teacher_id' => User::query()->where('role_id', 2)->inRandomOrder()->first()->id,
            'homework_id' => HomeWork::query()->inRandomOrder()->first()->id
        ];
    }
}
