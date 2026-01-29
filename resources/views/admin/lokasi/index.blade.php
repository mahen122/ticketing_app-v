@extends('layouts.admin_layouts')

@section('title', 'Manajemen Lokasi')

@section('content')
<div class="container mx-auto p-10">
    <div class="flex">
        <h1 class="text-3xl font-semibold mb-4">Manajemen Lokasi</h1>
        <a href="{{ route('admin.lokasi.create') }}" class="btn btn-primary ml-auto">Tambah Lokasi</a>
    </div>
    <div class="overflow-x-auto rounded-box bg-white p-5 shadow-xs">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lokasi</th>
                    <th>Aktif</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lokasi as $index => $l)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $l->nama_lokasi }}</td>
                    <td>{{ $l->aktif }}</td>
                    <td>{{ $l->created_at }}</td>
                    <td>{{ $l->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.lokasi.edit', $l->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.lokasi.destroy', $l->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menonaktifkan lokasi ini?')">Nonaktifkan</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data lokasi aktif.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection