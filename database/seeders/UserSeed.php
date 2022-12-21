<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			'number_id' => '5315374001',
			'name' => 'Johan',
			'last_name' => 'Restrepo',
			'email' => 'johan@johan.com',
			'password' => bcrypt(123456789)
		]);
	}
}
