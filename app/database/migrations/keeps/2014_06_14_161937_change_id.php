<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('users', function($table)
			{
		    $table->renameColumn('userid', 'id');
			//$table->renameColumn('from', 'to');

				//$table->string('description','56');
			}//end closure 
		);//end static method 
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::table('users', function($table)
			{
			    $table->renameColumn('id', 'userid');
			}//end closure 
			);//end static method 
	}

}
