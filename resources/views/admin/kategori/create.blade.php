@extends('layouts.admin_layouts')

@section('content')
    <div class="container mx-auto py-6">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Tambah Kategori</h1>
        </div>

        <div class="bg-white rounded-lg shadow p-6 max-w-md">
            <form action="{{ route('admin.kategori.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori</label>
                    <input type="text" id="nama_kategori" name="nama_kategori" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('nama_kategori') border-red-500 @enderror"
                           value="{{ old('nama_kategori') }}" required>
                    @error('nama_kategori')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Simpan
                    </button>
                    <a href="{{ route('admin.kategori.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
