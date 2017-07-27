<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsedit extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('questiontable', function($table)
		{
				$table->foreign('questionoptionsid')->references('questionoptionsid')->on('questionoptions');

				//$table->integer('modifiedby');
				$table->foreign('questionanswerid')->references('questionanswerid')->on('questionsanswers');
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
