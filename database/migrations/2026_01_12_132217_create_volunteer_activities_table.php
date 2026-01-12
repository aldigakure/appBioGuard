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
        Schema::create('volunteer_activities', function (Blueprint $table) {
            $table->id('activity_id');
            $table->foreignId('program_id')->constrained('reforestation_programs', 'program_id')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->date('activity_date');
            $table->integer('trees_planted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_activities');
    }
};
