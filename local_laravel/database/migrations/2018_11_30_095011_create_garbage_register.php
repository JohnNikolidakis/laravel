<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarbageRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garbage_bin_register', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type');
			$table->integer('max_capacity');
			$table->integer('cur_capacity');
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
        //
    }
}
