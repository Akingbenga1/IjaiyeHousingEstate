<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addforeign extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('subject_score', function($table)
		{
				
				//$table->integer('createdby');
				$table->foreign('createdby')->references('userid')->on('users');

				//$table->integer('modifiedby');
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
