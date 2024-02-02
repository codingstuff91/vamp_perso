<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCharactersTable extends Migration {

	public function up()
	{
		Schema::create('characters', function(Blueprint $table) {
			$table->id();
			$table->unsignedInteger('user_id')->constrained();
			$table->unsignedInteger('chronicle_id')->constrained();
            $table->string('name', 20);
            $table->unsignedInteger('clan_id')->constrained();
			$table->unsignedTinyInteger('generation');
			$table->string('sire', 20);
            $table->unsignedTinyInteger('experience_points')->default(0);
            $table->unsignedTinyInteger('experience_total')->default(0);
            $table->unsignedTinyInteger('true_age')->nullable();
            $table->unsignedTinyInteger('appearance')->nullable();
			$table->unsignedTinyInteger('apparent_age')->nullable();
			$table->unsignedSmallInteger('embrace_year')->nullable();
            $table->unsignedInteger('predation_id')->constrained();
            $table->unsignedInteger('compulsion_id')->constrained()->nullable();
            $table->text('background')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('characters');
	}
}
