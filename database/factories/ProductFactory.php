<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'category_id' => fake()->randomElement([1, 2, 3]),
			'name' => fake()->sentence(3),
			'description' => fake()->paragraph(),
			'price' => fake()->randomFloat(2, 0, 100000),
			'stock' => fake()->randomNumber(2)
		];
	}
}
