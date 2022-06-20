<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition()
    {
        $this->faker->addProvider(new \DavidBadura\FakerMarkdownGenerator\FakerProvider($this->faker));
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->unique()->sentence(),
            'slug' => $this->faker->slug,
            'body' => $this->faker->unique()->markdown(),
        ];
    }
}
