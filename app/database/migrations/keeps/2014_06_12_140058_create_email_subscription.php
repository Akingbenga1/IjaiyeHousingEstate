<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailSubscription extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()    
	{
		//what happen when we use the table
		Schema::create('emailsubscription', function($table)
		{
			$table->increments('id'); // this is an id with an auto incre,ment
			$table->string('subscriberemail', 60);// this is a varchar
			$table->string('subscribername', 500);// this is a vachar
			$table->timestamps ();
		}//end closure function
		);//end of schema method
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//what happen when we roll back the table
		//Schema::drop('emailsubscription');
		
		
	}

}
