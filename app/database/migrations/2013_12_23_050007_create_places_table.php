<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('places', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('desc');
			$table->decimal('latitude');
			$table->decimal('longitude');
			$table->integer('score');
			$table->integer('user_id');
			$table->integer('submap_id');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('places');
	}

}
