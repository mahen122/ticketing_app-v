<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasi = \App\Models\Lokasi::aktif()->get();
        return view('admin.lokasi.index', compact('lokasi'));
    }

    public function create()
    {
        return view('admin.lokasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:255',
        ]);
        \App\Models\Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
            'aktif' => 'Y',
        ]);
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $lokasi = \App\Models\Lokasi::findOrFail($id);
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:255',
        ]);
        $lokasi = \App\Models\Lokasi::findOrFail($id);
        $lokasi->update([
            'nama_lokasi' => $request->nama_lokasi,
        ]);
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $lokasi = \App\Models\Lokasi::findOrFail($id);
        $lokasi->update(['aktif' => 'N']);
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil di-nonaktifkan');
    }
}
