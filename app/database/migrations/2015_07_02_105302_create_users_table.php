<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
           $table->increments('id');

			$table->string('username', 32);
			$table->string('password', 64);

			$table->enum('role', array('admin', 'lender'));

			//add a new nullable remember_token of VARCHAR(100), TEXT
			$table->TEXT('remember_token', 100)->nullable();
/*
			$table->timestamp('created_at');
           $table->timestamp('deleted_at')->nullable();
           $table->timestamp('updated_at')->nullable();
           */
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
		Schema::dropIfExists('users');
	}

}
