<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

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
				$table->text('school_admission_number');
				$table->unique('school_admission_number');
				$table->enum('sex');
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

		Schema::drop('items');
	}

}
