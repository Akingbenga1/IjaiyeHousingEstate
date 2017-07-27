<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{   
		//

		Schema::create('categories', function($table)

			{
				$table->increments('categoryid');
				$table->timestamps();
				$table->string('categoryname', 50);
				$table->text('categorydescription');

			}//end closure

			);//end static method create
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//

		Schema::drop('categories');
	}

}
