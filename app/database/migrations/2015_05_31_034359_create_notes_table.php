<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        /*
		Schema::table('notes', function(Blueprint $table)
		{
			//
		});
        */
        Schema::create('notes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('userid')->unique();
            $table->string('email')->unique();
            $table->string('notes', 1024);
            $table->string('tbd', 1024);
            $table->string('hlink1');
            $table->string('hlink2');
            $table->string('hlink3');
            $table->string('hlink4');
            $table->binary('img1')->nullable();
            $table->binary('img2')->nullable();
            $table->binary('img3')->nullable();
            $table->binary('img4')->nullable();
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
        /*
		Schema::table('notes', function(Blueprint $table)
		{
			//
		});
        */
        Schema::drop('notes');
	}

}
