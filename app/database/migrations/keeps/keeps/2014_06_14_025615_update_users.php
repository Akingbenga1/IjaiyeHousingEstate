<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsers extends Migration {

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
				$table->string('activationcode', '60');
				$table->integer('activated');			
			}
			
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
					$table->dropColumn('activationcode','activated');
				}//end closure
			);//end static method
	}//end method down

}
