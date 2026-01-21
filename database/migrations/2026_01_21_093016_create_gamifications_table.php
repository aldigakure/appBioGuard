<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gamifications', function (Blueprint $table) {
            $table->id();
            // Menghubungkan skor dengan ID User
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Data Game
            $table->integer('total_points')->default(0);
            $table->integer('highest_streak')->default(0); // Opsional: Simpan rekor streak
            $table->string('badge_level')->default('Ranger Pemula'); // Pangkat user
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gamifications');
    }
};