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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas'); // Primary Key: id_kelas
            $table->string('nama_kelas'); // Nama Kelas
            $table->integer('jumlah_siswa')->default(0); // Jumlah Siswa
            $table->string('tahun_ajaran', 9); // Tahun Ajaran (misal: 2023/2024)
            $table->enum('status', ['aktif', 'tidak_aktif']); // Status Kelas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
