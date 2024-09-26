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
            $table->integer('nis')->primary(); // Primary Key: NIS
            $table->string('nama_siswa', 255); // Nama Siswa
            $table->unsignedBigInteger('id_kelas'); // Foreign Key: id_kelas
            $table->enum('kelamin', ['laki-laki', 'perempuan']); // Kelamin
            $table->string('nama_ayah', 255); // Nama Ayah
            $table->string('nama_ibu', 255); // Nama Ibu
            $table->string('alamat', 255); // Alamat
            $table->timestamps();

            // Relasi ke tabel kelas
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
