<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
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
            'profile_image' => '/storage/profile_images/user1.jpg',
            'about' => $this->faker->text,
            'location' => $this->faker->locale,
            'education' => $this->faker->sentence,
            'age'=> $this->faker->numberBetween(10,20)
        ];
    }
}
