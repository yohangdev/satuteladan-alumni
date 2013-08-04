<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersfbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('usersfb', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
			$table->integer('user_id')->unsigned()->index();            
            $table->bigInteger('fb_userid')->unsigned()->index();
            $table->string('fb_name');
            $table->string('fb_email')->index();
            $table->string('fb_link');
            $table->text('fb_token');
            $table->timestamps();
            $table->softDeletes();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');			            
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usersfb');
	}

}