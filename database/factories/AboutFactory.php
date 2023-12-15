<?php

namespace Database\Factories;

use App\Models\About;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = About::class;

    public function definition(): array
    {
        return [
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl(640, 480, 'animals', true)
        ];
    }
}
