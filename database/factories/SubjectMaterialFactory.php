<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectMaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'material_link'=>$this->faker->url,
            'subject_material'=>$this->faker->text,
            'subject_id'=>Subject::query()->inRandomOrder()->first()->id
        ];
    }
}
