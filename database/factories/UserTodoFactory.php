<?php

namespace Database\Factories;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserTodo>
 */
class UserTodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'user' => $this->faker->randomElement(User::all('id')->pluck('id')->push(null)->toArray()),
            'todo' => $this->faker->randomElement(Todo::all('id')->pluck('id')->toArray()),
        ];
    }
}
