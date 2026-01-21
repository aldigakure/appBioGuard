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
            
            // Level Kesulitan (Sesuai kolom CSV kamu)
            $table->enum('difficulty', ['mudah', 'sedang', 'sulit', 'sangat_sulit']);
            
            // Pertanyaan
            $table->text('question');
            
            // Opsi Jawaban A-E (Disimpan sebagai JSON Array biar rapi)
            // Contoh isi: ["Jati", "Padi", "Kelapa", "Anggrek", "Jagung"]
            $table->json('options');
            
            // Kunci Jawaban (Disimpan sebagai INDEX angka)
            // 0 = A, 1 = B, 2 = C, 3 = D, 4 = E
            $table->tinyInteger('correct_index');
            
            // Poin (25, 50, 75, 100)
            $table->integer('points')->default(25);
            
            // Penjelasan (Opsional, untuk edukasi setelah jawab)
            $table->text('explanation')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};