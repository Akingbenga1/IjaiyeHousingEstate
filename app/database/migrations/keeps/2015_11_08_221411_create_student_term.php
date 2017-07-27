<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTerm extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('student_term', function($table)
			{
				$table->increments('id');
				
				$table->integer('thistermid')->unsigned();
				$table->foreign('thistermid')->references('id')->on('thisterm');

				$table->integer('studentid')->unsigned();
				$table->foreign('studentid')->references('studentid')->on('students');

			}//end closure
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
