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
        Schema::create('reforestation_programs', function (Blueprint $table) {
            $table->id('program_id');
            $table->foreignId('habitat_id')->constrained('habitats', 'habitat_id');
            $table->float('target_area');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->float('impact_score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reforestation_programs');
    }
};
