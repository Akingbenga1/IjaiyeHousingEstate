<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('items', function($table)
			{
				$table->increments('itemid');
				$table->string('itemname', 50);
				$table->text('itemdescription');
				$table->text('productdetails');
				$table->integer('quantity');

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

		Schema::drop('items');
	}

}
