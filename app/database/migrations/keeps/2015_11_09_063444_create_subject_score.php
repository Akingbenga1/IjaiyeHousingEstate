<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectScore extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('subject_score', function($table)
			{
				$table->increments('scoreid');

				
				$table->integer('studenttermid')->unsigned();
				$table->foreign('studenttermid')->references('id')->on('student_term');

				$table->integer('cont_assess_40');
				$table->integer('exam_score_60');


				$table->integer('gradeid')->unsigned();
				$table->foreign('gradeid')->references('gradeid')->on('grades');

				$table->integer('subjectid')->unsigned();
				$table->foreign('subjectid')->references('subjectid')->on('subjects');

				$table->text('teacher_comment');
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
	}

}
