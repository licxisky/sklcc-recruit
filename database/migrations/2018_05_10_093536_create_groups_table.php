<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration 
{
	public function up()
	{
		Schema::create('groups', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('description', 255)->nullable();
            $table->text('question')->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('groups');
	}
}
