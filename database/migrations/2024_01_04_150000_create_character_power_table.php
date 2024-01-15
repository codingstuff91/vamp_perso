<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCharacterPowerTable extends Migration {

	public function up()
	{
		Schema::create('character_power', function(Blueprint $table) {
			$table->increments('id');
            $table->unsignedSmallInteger('character_id');
            $table->foreign('character_id')->references('id')->on('characters');
            $table->unsignedSmallInteger('power_id');
            $table->foreign('power_id')->references('id')->on('powers');

		});
	}

	public function down()
	{
		Schema::drop('character_power');
	}
}
