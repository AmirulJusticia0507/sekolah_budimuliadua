@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @section('content')
<div class="container mt-5">
    <h2>Edit Siswa</h2>
    <form action="{{ route('siswa.update', $siswa->nis) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_siswa" class="form-label">Nama Siswa</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}" required>
        </div>
        <div class="mb-3">
            <label for="id_kelas" class="form-label">Kelas</label>
            <select class="form-select" id="id_kelas" name="id_kelas" required>
                @foreach($kelas as $k)
                    <option value="{{ $k->id_kelas }}" {{ $siswa->id_kelas == $k->id_kelas ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="kelamin" name="kelamin" required>
                <option value="Laki-laki" {{ $siswa->kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $siswa->kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_ayah" class="form-label">Nama Ayah</label>
            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ $siswa->nama_ayah }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_ibu" class="form-label">Nama Ibu</label>
            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $siswa->nama_ibu }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $siswa->alamat }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert script -->
<script>
    @if(session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif
</script>
@endsection
</body>
</html>
