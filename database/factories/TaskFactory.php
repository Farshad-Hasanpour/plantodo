<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'list_id' => \App\Models\TodoList::factory(),
			'title' => fake()->text(32),
			'description' => fake()->text(100),
			'is_done' => fake()->boolean(),
			'due' => fake()->dateTime(),
			'priority' => fake()->randomDigit(),

		];
	}
}
