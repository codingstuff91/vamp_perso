<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDisciplinesTable extends Migration {

	public function up()
	{
		Schema::create('disciplines', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 30);
		});
	}

	public function down()
	{
		Schema::drop('disciplines');
	}
}