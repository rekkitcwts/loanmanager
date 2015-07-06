<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loans', function(Blueprint $table){
			$table->increments('id');
			$table->string('loan_purpose', 255);
			$table->decimal('amount', 8, 2);
			$table->decimal('interest', 4, 2);
			$table->date('due_date');
			$table->date('date_approved')->nullable();
			$table->integer('borrower_id')->unsigned();
			$table->foreign('borrower_id')->references('id')->on('borrowers');

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
		Schema::dropIfExists('loans');
	}

}
