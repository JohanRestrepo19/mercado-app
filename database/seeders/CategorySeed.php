<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeed extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// 1
		DB::table('categories')->insert([
			'name' => 'Hogar',
		]);

		// 2
		DB::table('categories')->insert([
			'name' => 'Videojuegos',
		]);

		// 3
		DB::table('categories')->insert([
			'name' => 'Electrodomesticos',
		]);
	}
}
