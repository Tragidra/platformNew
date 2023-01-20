<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonDescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file' => '/storage/lesson_descriptions/b449ff3029fbd275e9feae777a39eca1.jpeg',
            'file_type' => 'image',
            'comment' => $this->faker->text,
            'user_id' => User::query()->where('role_id', 1)->inRandomOrder()->first()->id,
            'lesson_id' => Lesson::query()->inRandomOrder()->first()->id,
        ];
    }
}
