<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		
		Schema::create('users', function($table)
			{
				$table->increments('userid');
				$table->string('useremail','50');
				$table->text('username');
				$table->timestamps();
			}//end closure
			);//end static method
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('users');//end static method
	}//end method down 

}//end class Migration
