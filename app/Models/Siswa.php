<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'nis'; // Primary key NIS (10 digits)

    protected $fillable = ['nis', 'nama_siswa', 'id_kelas', 'kelamin', 'nama_ayah', 'nama_ibu', 'alamat'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }
}
