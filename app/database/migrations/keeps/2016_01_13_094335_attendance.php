<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Attendance extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('attendance', function($table)
		{				
				$table->increments('attendanceid');
				$table->enum('termname',array('first term', 'second term','third term'));
				$table->string('classname', 5 );
				$table->string('year', 4);

				$table->integer('studentid')->unsigned();
				$table->foreign('studentid')->references('studentid')->on('students');

				$table->smallInteger('schoolopen');
				$table->smallInteger('dayspresent');
				$table->smallInteger('daysabent');
				$table->timestamps();

				$table->integer('createdby')->unsigned();
				$table->foreign('createdby')->references('userid')->on('users');
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
