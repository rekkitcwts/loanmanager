<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('borrowers', function(Blueprint $table) 
		{
			$table->increments('id');

			$table->string('lname', 255);
			$table->string('fname', 255);
			$table->string('mname', 255);
			$table->enum('gender', array('male', 'female'));
			$table->string('home_address', 300);

			$table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('borrowers');
	}

}
