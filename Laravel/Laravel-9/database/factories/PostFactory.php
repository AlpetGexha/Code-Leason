<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\PostStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(), //crate user and give him id from factory 
            'title' => $this->faker->sentence(), //random titles
            'body' => $this->faker->paragraph(), //random body
            'status' => $this->faker->randomElement(['draft', 'public', 'private']), //random status
            //  'status' => $this->faker->randomElement(PostStatus::class), //random status       
        ];
    }
}
