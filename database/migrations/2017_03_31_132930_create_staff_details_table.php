<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('staff_details', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('emp_id');
            $table->string('degree');
            $table->string('department');
            $table->date('date_of_join');
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
        Schema::drop('staff_details');
	}

}
