<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function(Blueprint $table)
		{
      $table->increments('id');
      $table->string('title')->index();
      $table->string('description')->index();
      $table->string('location')->index();
      $table->integer('salary')->index();
      $table->dateTime('startingdate');
      $table->dateTime('endingdate');
      $table->integer('user_id');
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
		Schema::drop('jobs');
	}

}
