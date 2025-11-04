<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::latest()->paginate(10);
        return view('admin.prestasi.index', compact('prestasis'));
    }

    public function create()
    {
        return view('admin.prestasi.form', ['prestasi' => new Prestasi()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'program_studi' => 'nullable|string|max:255',
            'judul_prestasi' => 'required|string|max:255',
            'tingkat' => 'required|string|in:kampus,nasional,internasional',
            'tahun' => 'required|digits:4',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        // Upload manual tanpa Storage
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/prestasi'), $namaFile);
            $validated['gambar'] = 'uploads/prestasi/' . $namaFile;
        }

        Prestasi::create($validated);

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.form', compact('prestasi'));
    }


    public function update(Request $request, Prestasi $prestasi)
    {
        $validated = $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'program_studi' => 'nullable|string|max:255',
            'judul_prestasi' => 'required|string|max:255',
            'tingkat' => 'required|string|in:kampus,nasional,internasional',
            'tahun' => 'required|digits:4',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($prestasi->gambar && file_exists(public_path($prestasi->gambar))) {
                unlink(public_path($prestasi->gambar));
            }

            // Upload file baru
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/prestasi'), $namaFile);
            $validated['gambar'] = 'uploads/prestasi/' . $namaFile;
        }

        $prestasi->update($validated);

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil diperbarui!');
    }

    public function destroy(Prestasi $prestasi)
    {
        // Hapus gambar jika ada
        if ($prestasi->gambar && file_exists(public_path($prestasi->gambar))) {
            unlink(public_path($prestasi->gambar));
        }

        $prestasi->delete();

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil dihapus!');
    }
}
