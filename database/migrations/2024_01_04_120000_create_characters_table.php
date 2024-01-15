<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCharactersTable extends Migration {

	public function up()
	{
		Schema::create('characters', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
			$table->unsignedInteger('chronicle_id');
            $table->foreign('chronicle_id')->references('id')->on('chronicles');
            $table->string('name', 20);
            $table->unsignedInteger('clan_id');
            $table->foreign('clan_id')->references('id')->on('clans');
			$table->unsignedTinyInteger('generation');
			$table->string('sire', 20);
            $table->unsignedTinyInteger('experience_points')->default(0);
            $table->unsignedTinyInteger('experience_total')->default(0);
            $table->unsignedTinyInteger('true_age')->nullable();
            $table->unsignedTinyInteger('appearance')->nullable();
			$table->unsignedTinyInteger('apparent_age')->nullable();
			$table->unsignedSmallInteger('embrace_year')->nullable();
            $table->string('ambition', 50);
            $table->string('conviction', 50);
            $table->string('desire', 50);
            $table->unsignedInteger('predation_id');
            $table->foreign('predation_id')->references('id')->on('predations');
            $table->unsignedInteger('compulsion_id')->nullable();
            $table->foreign('compulsion_id')->references('id')->on('compulsions');
            $table->text('background')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('characters');
	}
}
