<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blood_potencies', function (Blueprint $table) {
            $table->id();
            $table->integer('level');
            $table->string('blood_rise', '50');
            $table->string('power_bonus', '50');
            $table->string('feeding_penalty', '50');
            $table->string('damage_healed_per_turn', '50');
            $table->string('hunger_test', '50');
            $table->string('bane_score', '50');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_potencies');
    }
};
