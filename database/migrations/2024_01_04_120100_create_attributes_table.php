<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttributesTable extends Migration {

	public function up()
	{
		Schema::create('attributes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('category', 30);
			$table->string('name', 20);
		});
	}

	public function down()
	{
		Schema::drop('attributes');
	}
}
