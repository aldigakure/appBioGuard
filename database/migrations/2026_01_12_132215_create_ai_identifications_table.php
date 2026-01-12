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
        Schema::create('ai_identifications', function (Blueprint $table) {
            $table->id('ai_id');
            $table->foreignId('observation_id')->constrained('observations', 'observation_id')->onDelete('cascade');
            $table->foreignId('predicted_species_id')->constrained('species', 'species_id');
            $table->float('confidence');
            $table->string('model_version');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_identifications');
    }
};
