<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Officialcomment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('officialcomment', function($table)
					{				
						$table->increments('officialcommentid');

						$table->enum('termname',array('first term', 'second term','third term'));
						$table->string('classname', 5 );
						$table->string('year', 4);

						$table->string('classteacher', 200);
						$table->string('classteachersignature', 200); 
						$table->date('classteachersdate', 200); 

						$table->string('principal', 200);
						$table->string('principalsignature', 200);
						$table->date('principaldate', 200);

						$table->string('parentsignature', 200);
						$table->date('parentdate', 200);


						$table->integer('studentid')->unsigned();
						$table->foreign('studentid')->references('studentid')->on('students');

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
