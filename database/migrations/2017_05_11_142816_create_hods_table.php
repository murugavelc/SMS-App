<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hods', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('name');
            $table->integer('emp_id');
            $table->string('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('degree');
            $table->string('department');
            $table->date('date_of_join');
            $table->string('photo');
            $table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hods');
	}

}
