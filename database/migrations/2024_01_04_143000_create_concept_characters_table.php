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
        Schema::create('concept_character', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('character_id')->constrained();
            $table->unsignedInteger('concept_id')->constrained();;
            $table->string('concept_value', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concept_character');
    }
};
