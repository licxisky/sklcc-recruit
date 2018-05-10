<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitsTable extends Migration 
{
	public function up()
	{
		Schema::create('recruits', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('file_id')->nullable();
            $table->integer('group_id');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('recruits');
	}
}
