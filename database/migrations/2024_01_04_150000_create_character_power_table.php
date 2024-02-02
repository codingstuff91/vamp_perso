<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCharacterPowerTable extends Migration {

	public function up()
	{
		Schema::create('character_power', function(Blueprint $table) {
			$table->id();
            $table->unsignedSmallInteger('character_id')->constrained();
            $table->unsignedSmallInteger('power_id')->constrained();

		});
	}

	public function down()
	{
		Schema::drop('character_power');
	}
}
