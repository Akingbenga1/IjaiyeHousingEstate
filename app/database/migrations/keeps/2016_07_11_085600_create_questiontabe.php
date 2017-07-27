<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestiontabe extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('questiontable', function($table)
					{				
						$table->increments('questiontableid');

						$table->enum('classname',array('SS1', 'SS2','SS3'));
						$table->enum('termname',array('first term', 'second term','third term'));
						$table->string('year', 4);

						$table->integer('subjectid')->unsigned();
						$table->foreign('subjectid')->references('subjectid')->on('subjects');

						$table->string('classteacher', 200);

						$table->text('questionstatement'); 
						$table->integer('questionnumber'); 
						$table->integer('questionsection')->unsigned(); 
						$table->integer('questionoptionsid')->unsigned(); 
						$table->integer('questionanswerid')->unsigned();

						$table->timestamps();

						$table->integer('createdby')->unsigned();
						$table->foreign('createdby')->references('userid')->on('users');

						$table->integer('modifiedby')->unsigned();
						$table->foreign('modifiedby')->references('userid')->on('users');
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
