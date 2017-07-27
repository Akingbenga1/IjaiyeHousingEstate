<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddassignedrolesid extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('stafftable', function($table)
					{				
						$table->integer('assignedroleid')->unsigned();
						$table->foreign('assignedroleid')->references('id')->on('assigned_roles');

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
