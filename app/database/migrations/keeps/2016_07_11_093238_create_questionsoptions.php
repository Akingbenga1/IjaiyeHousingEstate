<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsoptions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('questionoptions', function($table)
					{				
						$table->increments('questionoptionsid');

						$table->string('optionA', 50);
						$table->string('optionB', 50);
						$table->string('optionC', 50);
						$table->string('optionD', 50);
						
						$table->timestamps();

						$table->integer('createdby')->unsigned();
						$table->foreign('createdby')->references('userid')->on('users');

						$table->integer('modifiedby')->unsigned();
						$table->foreign('modifiedby')->references('userid')->on('users');
		});//end closure
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
