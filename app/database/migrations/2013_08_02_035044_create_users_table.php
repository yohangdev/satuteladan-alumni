<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->boolean('active');
            $table->boolean('external');
            $table->boolean('verified');
            $table->integer('verified_by')->unsigned()->nullable()->default(null);
            $table->timestamp('verified_date')->nullable()->default(null);
            $table->timestamp('login_last');
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
		Schema::drop('users');
	}

}