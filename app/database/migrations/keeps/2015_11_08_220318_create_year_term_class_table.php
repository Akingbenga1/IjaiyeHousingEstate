<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearTermClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('year_term_class', function($table)
			{
				$table->increments('id');
				$table->integer('classid')->unsigned();
				$table->foreign('classid')->references('classid')->on('class');

				$table->integer('termid')->unsigned();
				$table->foreign('termid')->references('termid')->on('term');

				$table->string('year', 4);
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
