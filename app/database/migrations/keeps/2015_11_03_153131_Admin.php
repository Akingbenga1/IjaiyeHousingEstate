<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admin extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		Schema::create('Admin', function($table)
			{
				$table->increments('adminid');
				$table->string('adminemail','50');
				$table->text('username');
				$table->string('activationcode', '60');
				$table->integer('activated');
				$table->string('password','60');
				$table->integer('admingroupid');
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
	}

}
