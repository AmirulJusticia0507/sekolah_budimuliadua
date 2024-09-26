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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id(); // optional if you don't use auto-incrementing ID
            $table->string('nis', 10)->unique(); // Ensure unique NIS
            $table->string('nama_siswa');
            $table->unsignedBigInteger('id_kelas');
            $table->enum('kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('alamat');
            $table->timestamps();

            // Foreign key constraint if necessary
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
