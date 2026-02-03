@extends('admin.layouts.templates')

@section('content')
    <div class="shadow p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="bg-success text-light">No</th>
                    <th class="bg-success text-light">NIS</th>
                    <th class="bg-success text-light">Nama Siswa</th>
                    <th class="bg-success text-light">Email</th>
                    <th class="bg-success text-light">Kelas</th>
                    <th class="bg-success text-light">Aksi</th>
                </tr>
            </thead>
            @foreach ($siswa as $index => $sis)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sis->nis }}</td>
                    <td>{{ $sis->user->nama }}</td>
                    <td>{{ $sis->user->email }}</td>
                    <td>{{ $sis->kelas }}</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit m-1"></i>Edit</a>
                        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit m-1"></i>Hapus</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection