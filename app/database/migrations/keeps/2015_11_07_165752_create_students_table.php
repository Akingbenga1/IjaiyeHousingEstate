<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('students', function($table)
			{
				$table->increments('studentid');
				$table->date('date_of_birth');
				$table->string('school_admission_number',4)->unique();
				$table->enum('sex', array('male', 'female'));
			}//end closure
		);//end static function create
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('students');
	}

}
