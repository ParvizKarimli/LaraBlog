<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            'category' => $this->faker->randomElement(['technology','design','politics','science','travel']),
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->paragraph(5)
        ];
    }
}
