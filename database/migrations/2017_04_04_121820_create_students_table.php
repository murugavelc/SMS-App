<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('name');
            $table->integer('rollno');
            $table->string('gender');
            $table->date('dob');
            $table->integer('phone');
            $table->string('email');
            $table->string('degree');
            $table->string('department');
            $table->string('year');
            $table->string('section');
            $table->string('grade');
            $table->string('fathername');
            $table->string('fatheroccupation');
            $table->string('mothername');
            $table->string('motheroccupation');
            $table->string('address');
            $table->string('district');
            $table->integer('pincode');
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
		Schema::drop('students');
	}

}
