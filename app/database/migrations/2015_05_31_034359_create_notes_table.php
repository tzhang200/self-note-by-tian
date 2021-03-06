<?php
/* T Zhang 2015 */
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
            $table->string('hlinks', 1024)->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE notes ADD img1 MEDIUMBLOB");
        DB::statement("ALTER TABLE notes ADD img2 MEDIUMBLOB");
        DB::statement("ALTER TABLE notes ADD img3 MEDIUMBLOB");
        DB::statement("ALTER TABLE notes ADD img4 MEDIUMBLOB");
        Schema::table('notes', function($table) {
           $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
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
