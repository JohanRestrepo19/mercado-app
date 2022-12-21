<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeed extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('products')->insert([
			'category_id' => 1,
			'name' => 'Recogedor',
			'description' => 'Una herramienta para el hogar',
			'price' => 10000,
			'stock' => 100,
		]);

		DB::table('products')->insert([
			'category_id' => 1,
			'name' => 'Escoba',
			'description' => 'Una herramienta para el hogar',
			'price' => 12000,
			'stock' => 50,
		]);
	}
}
