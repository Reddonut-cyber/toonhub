<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comic>
 */
class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name' => $this->faker->words(3, true), 
        'summary' => $this->faker->paragraph(), 
        'status' => $this->faker->randomElement(['Ongoing', 'Completed']),
        'comic_web' => $this->faker->url(),
    ];
    }
}
