@extends('layouts.admin_layouts')
@section('content')
<div class="flex justify-center items-center min-h-[60vh]">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit Lokasi</h2>
        <form action="{{ route('admin.lokasi.update', $lokasi->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label for="nama_lokasi" class="block text-sm font-medium text-gray-700 mb-1">Nama Lokasi</label>
                <input type="text" name="nama_lokasi" id="nama_lokasi" class="form-input w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ $lokasi->nama_lokasi }}" required>
                @error('nama_lokasi')
                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition">Update</button>
                <a href="{{ route('admin.lokasi.index') }}" class="bg-pink-500 hover:bg-pink-600 text-white font-semibold px-6 py-2 rounded-lg shadow transition">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection