<?php

use Illuminate\Database\Migrations\Migration;

class CreatePinsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('pins', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
			$table->integer('user_id')->unsigned()->index();            
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->string('source');
            $table->string('type');
            $table->boolean('published');
            $table->smallInteger('moderation')->unsigned();
            $table->integer('moderated_by')->unsigned()->nullable()->default(null);
            $table->timestamp('moderated_at')->nullable()->default(null);            
            $table->timestamps();
            $table->softDeletes();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');			            
			$table->foreign('moderated_by')->references('id')->on('users');			            
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pins');
	}

}