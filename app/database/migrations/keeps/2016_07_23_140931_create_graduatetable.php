<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraduatetable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('graduatetable', function($table)
					{				
						$table->increments('graduatetableid');

						
						$table->string('class_subdivision',2);
						$table->string('year', 4);

						$table->integer('studentid')->unsigned();
						$table->foreign('studentid')->references('studentid')->on('students');

						$table->integer('createdby')->unsigned();
						$table->foreign('createdby')->references('userid')->on('users');

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
