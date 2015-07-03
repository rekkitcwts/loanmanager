<?php

class UserTableSeeder extends DatabaseSeeder{
	public function run(){
		$users = [
			[
				'username' => 'admin',
				'password' => Hash::make('password'),
				'role' => 'admin',
				'created_at' => new DateTime,
                'updated_at' => new DateTime
			]
		];

		Eloquent::unguard();
		foreach ($users as $user) {
			User::create($user);
		}
	}
}