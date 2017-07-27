<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaff extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('stafftable', function($table)
					{				
						$table->increments('stafftableid');

						$table->integer('staffid')->unsigned();
						$table->foreign('staffid')->references('userid')->on('users');

						$table->integer('roleid')->unsigned();
						$table->foreign('roleid')->references('id')->on('roles');

						$table->string('designation', 200);

						$table->enum('classname',array('SS1', 'SS2','SS3'));
						$table->enum('termname',array('first term', 'second term','third term'));
						$table->string('year', 4);

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
