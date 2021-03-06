<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionresultaddsubject extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('questionresult', function($table)
		{
				
				$table->integer('subjectid')->unsigned();
				$table->foreign('subjectid')->references('subjectid')->on('subjects');
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
