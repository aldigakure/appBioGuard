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
        Schema::create('gamification', function (Blueprint $table) {
            $table->id('game_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->unique();
            $table->integer('points')->default(0);
            $table->string('badge')->nullable();
            $table->integer('level')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gamifications');
    }
};
