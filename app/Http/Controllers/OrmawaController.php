<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use Illuminate\Http\Request;

class OrmawaController extends Controller
{
    public function index()
    {
        $ormawas = Ormawa::latest()->paginate(10);
        return view('admin.ormawa.index', compact('ormawas'));
    }

    public function create()
    {
        return view('admin.ormawa.form', ['ormawa' => new Ormawa()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'jumlah_anggota' => 'nullable|integer',
        ]);

        // Upload manual tanpa Storage
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/ormawa'), $namaFile);
            $validated['gambar'] = 'uploads/ormawa/' . $namaFile;
        }

        Ormawa::create($validated);

        return redirect()->route('ormawa.index')->with('success', 'Organisasi berhasil ditambahkan.');
    }

    public function edit(Ormawa $ormawa)
    {
        return view('admin.ormawa.form', compact('ormawa'));
    }

    public function update(Request $request, Ormawa $ormawa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'jumlah_anggota' => 'nullable|integer',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus file lama
            if ($ormawa->gambar && file_exists(public_path($ormawa->gambar))) {
                unlink(public_path($ormawa->gambar));
            }

            // Upload file baru
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/ormawa'), $namaFile);
            $validated['gambar'] = 'uploads/ormawa/' . $namaFile;
        }

        $ormawa->update($validated);

        return redirect()->route('ormawa.index')->with('success', 'Organisasi berhasil diperbarui.');
    }

    public function destroy(Ormawa $ormawa)
    {
        // Hapus gambar jika ada
        if ($ormawa->gambar && file_exists(public_path($ormawa->gambar))) {
            unlink(public_path($ormawa->gambar));
        }

        $ormawa->delete();

        return redirect()->route('ormawa.index')->with('success', 'Organisasi berhasil dihapus.');
    }
}
