@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css"/>
</head>
<body>

    @section('content')
    <div class="container mt-5">
        <h2>Data Kelas</h2>
        <a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">Tambah Kelas</a>
        <table id="kelasTable" class="display table table-bordered table-striped table-hover responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID Kelas</th>
                    <th>Nama Kelas</th>
                    <th>Jumlah Siswa</th>
                    <th>Tahun Ajaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($kelas && $kelas->count())
                    @foreach($kelas as $k)
                    <tr>
                        <td>{{ $k->id_kelas }}</td>
                        <td>{{ $k->nama_kelas }}</td>
                        <td>
                            {{ $k->jumlah_siswa }} |
                            <!-- Button to trigger modal -->
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#studentModal-{{ $k->id_kelas }}">
                                Lihat Detail
                            </button>

                            <!-- Modal for student details -->
                            <div class="modal fade" id="studentModal-{{ $k->id_kelas }}" tabindex="-1" aria-labelledby="studentModalLabel-{{ $k->id_kelas }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="studentModalLabel-{{ $k->id_kelas }}">Detail Siswa di Kelas {{ $k->nama_kelas }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID Siswa</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Alamat</th>
                                                        <th>Telepon</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($k->siswa as $student) <!-- Assuming you have a relation set up in your Kelas model -->
                                                    <tr>
                                                        <td>{{ $student->id }}</td>
                                                        <td>{{ $student->nama }}</td>
                                                        <td>{{ $student->alamat }}</td>
                                                        <td>{{ $student->telepon }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $k->tahun_ajaran }}</td>
                        <td>{{ $k->status }}</td>
                        <td>
                            <a href="{{ route('kelas.edit', $k->id_kelas) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kelas.destroy', $k->id_kelas) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data kelas.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- jQuery and DataTables CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#kelasTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    @endsection

</body>
</html>
