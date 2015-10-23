<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('categories', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name')->unique();
		    $table->integer('user_id')->unsigned();
		    $table->timestamps();

		    $table->foreign('user_id')
			    ->references('id')
			    ->on('users')
			    ->onDelete('restrict');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::drop('categories');
    }
}