<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::firstOrCreate(
			[
				'email' => 'admin@email.com',
			],
			[
				'name' => 'Administrador Padrão',
				// 'avatar' => 'admin.jpg',
				'password' => Hash::make('admin'),
				'email_verified_at' => Carbon::now()->toDateTimeString(),
				'remember_token' => Str::random(10),
			],
		);

		$usersQuantity = 99;

		factory(User::class, $usersQuantity)->create()->each(function ($users) {
			// print_r($users);
			// $users->person()->save(factory(Person::class)->make());
			$users->save();
		});
	}
}
