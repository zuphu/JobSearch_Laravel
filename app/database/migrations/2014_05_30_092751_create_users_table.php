<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
      $table->increments('id');
      $table->string('email')->unique();
      $table->string('password')->index();
      $table->string('firstname');
      $table->string('lastname');
      $table->string('category');
      $table->string('phonenumber');
      $table->string('remember_token');
      //$table->foreign('job_id')->references('id')->on('jobs');
      //$table->foreign('application_id')->references('id')->on('application');
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
		Schema::drop('users');
	}

}
