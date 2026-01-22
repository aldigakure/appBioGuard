<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            
            // Kategori: Memisahkan Flora dan Fauna
            $table->enum('category', ['flora', 'fauna']);
            
            // Level Kesulitan
            $table->enum('difficulty', ['mudah', 'sedang', 'sulit', 'sangat_sulit']);
            
            // Pertanyaan
            $table->text('question');
            
            // Kolom Image (PENTING: Harus ada karena di seeder kita pakai ini)
            // Nullable artinya boleh kosong jika soal hanya teks
            $table->string('image')->nullable(); 
            
            // Opsi Jawaban (JSON Array)
            $table->json('options');
            
            // Kunci Jawaban (Index 0-4)
            $table->tinyInteger('correct_index');
            
            // Poin
            $table->integer('points')->default(25);
            
            // Penjelasan untuk Feedback Edukatif
            $table->text('explanation')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};