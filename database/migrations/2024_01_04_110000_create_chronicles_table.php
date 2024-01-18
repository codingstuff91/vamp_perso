<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChroniclesTable extends Migration {

	public function up()
	{
		Schema::create('chronicles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 30);
			$table->text('details');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('chronicles');
	}
}