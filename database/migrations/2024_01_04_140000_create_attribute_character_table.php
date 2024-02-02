<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttributeCharacterTable extends Migration {

	public function up()
	{
		Schema::create('attribute_character', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('character_id')->constrained();
			$table->unsignedInteger('attribute_id')->constrained();
            $table->unsignedTinyInteger('attribute_value');
		});
	}

	public function down()
	{
		Schema::drop('attribute_character');
	}
}
