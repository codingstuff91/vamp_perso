<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePowersTable extends Migration {

	public function up()
	{
		Schema::create('powers', function(Blueprint $table) {
			$table->increments('id');
            $table->unsignedSmallInteger('discipline_id');
            $table->foreign('discipline_id')->references('id')->on('disciplines');
			$table->string('name', 20);
			$table->tinyInteger('level');
            $table->string('cost', 50);
            $table->string('dice_pool', 20);
            $table->text('system');
            $table->text('duration');
		});
	}

	public function down()
	{
		Schema::drop('powers');
	}
}
