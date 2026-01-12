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
        Schema::create('observations', function (Blueprint $table) {
            $table->id('observation_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->foreignId('species_id')->nullable()->constrained('species', 'species_id');
            $table->foreignId('habitat_id')->constrained('habitats', 'habitat_id');
            $table->timestamp('observation_time');
            $table->string('source_type'); // camera_trap, citizen, sensor
            $table->float('confidence_score')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observations');
    }
};
