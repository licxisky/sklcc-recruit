<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration 
{
	public function up()
	{
		Schema::create('files', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('path', 255)->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('files');
	}
}
