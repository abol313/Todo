<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'title' => $this->faker->realText(100),
            'description' => $this->faker->realText(),
            'category' => $this->faker->randomElement(Category::all(['id'])->pluck('id')->push(null)->toArray()),
        ];
    }
}
