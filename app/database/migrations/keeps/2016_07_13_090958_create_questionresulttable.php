<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionresulttable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('questionresult', function($table)
					{				
						$table->increments('questionresultid');

						$table->enum('classname',array('SS1', 'SS2','SS3'));
						$table->enum('termname',array('first term', 'second term','third term'));
						$table->string('year', 4);

						$table->integer('score')->unsigned();
						$table->integer('total')->unsigned();

						$table->integer('candidate')->unsigned();
						$table->foreign('candidate')->references('userid')->on('users');

						$table->timestamps();
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
