@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css"/>
</head>
<body>

    @section('content')
    <div class="container mt-5">
        <h2>Data Siswa</h2>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>
        <table id="siswaTable" class="display table table-bordered table-striped table-hover responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $s)
                <tr>
                    <td>{{ $s->nis }}</td>
                    <td>{{ $s->nama_siswa }}</td>
                    <td>{{ $s->kelas->nama_kelas }}</td>
                    <td>{{ $s->kelamin }}</td>
                    <td>{{ $s->nama_ayah }}</td>
                    <td>{{ $s->nama_ibu }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', $s->nis) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('siswa.destroy', $s->nis) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- jQuery and DataTables CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="cdn.datatables.net/buttons/2.3.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#siswaTable').DataTable({
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
