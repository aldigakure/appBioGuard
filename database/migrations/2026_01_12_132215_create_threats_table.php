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
        Schema::create('threats', function (Blueprint $table) {
            $table->id('threat_id');
            $table->foreignId('habitat_id')->constrained('habitats', 'habitat_id');
            $table->string('threat_type'); // poaching, logging, pollution
            $table->string('severity');
            $table->string('detected_by'); // AI, sensor, report
            $table->timestamp('detected_at');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('threats');
    }
};
