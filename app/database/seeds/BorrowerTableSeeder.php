<?php

class BorrowerTableSeeder extends DatabaseSeeder{
	public function run(){
		$borrowers = [
			[
				'lname' => 'Benitez',
				'fname' => 'Jervey',
				'mname' => 'Ricablanca',
				'gender' => 'male',
				'home_address' => 'Palao, Iligan City',
				'created_at' => new DateTime,
                'updated_at' => new DateTime
			],
			[
				'lname' => 'Oponda',
				'fname' => 'Wenhern Ralph',
				'mname' => 'Olita',
				'gender' => 'male',
				'home_address' => 'Gango, Ozamiz City',
				'created_at' => new DateTime,
                'updated_at' => new DateTime
			],
			[
				'lname' => 'Britania',
				'fname' => 'Jay Steven',
				'mname' => 'Anduyan',
				'gender' => 'male',
				'home_address' => 'Davao City',
				'created_at' => new DateTime,
                'updated_at' => new DateTime
			],
			[
				'lname' => 'Podiotan',
				'fname' => 'Sunshine',
				'mname' => 'Encabo',
				'gender' => 'female',
				'home_address' => 'Aloran, Misamis Occidental',
				'created_at' => new DateTime,
                'updated_at' => new DateTime
			]
		];

		Eloquent::unguard();
		foreach ($borrowers as $borrower) {
			Borrower::create($borrower);
		}
	}
}