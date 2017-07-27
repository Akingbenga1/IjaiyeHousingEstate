<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Officialsign extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('officialsignature', function($table)
					{				
						$table->foreign('userid')->references('userid')->on('users');

						$table->timestamps();

					
						$table->foreign('createdby')->references('userid')->on('users');

				
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
