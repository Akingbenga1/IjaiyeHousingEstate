<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPassword extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('users', function($table)
			{
				$table->string('password','60');
			}//end closure 
		);// end static method 
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
				Schema::table('users', function($table)
			{
				$table->dropColumn('description');
			}//end closure
		);//end 
	
	}

}
