<?php
/* T Zhang 2015 */
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
        /*
		Schema::table('users', function(Blueprint $table)
		{
			//
		});
        */
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password', 80);
            $table->string('remember_token', 100)->nullable();
            $table->boolean('confirmed')->default(0);
            $table->string('confirmcode')->nullable();
            $table->integer('attempts')->default(0);
            $table->boolean('locked')->default(0);
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
		Schema::table('users', function(Blueprint $table)
		{
			//
		});
        */
        Schema::drop('users');
	}

}
