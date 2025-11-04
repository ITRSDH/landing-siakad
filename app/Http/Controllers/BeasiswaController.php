<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function index()
    {
        $beasiswas = Beasiswa::latest()->paginate(10);
        return view('admin.beasiswa.index', compact('beasiswas'));
    }

    public function create()
    {
        return view('admin.beasiswa.form', ['beasiswa' => new Beasiswa()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'kuota' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // simpan file gambar manual ke public/beasiswa
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/beasiswa'), $filename);
            $validated['gambar'] = 'uploads/beasiswa/' . $filename;
        }

        Beasiswa::create($validated);

        return redirect()->route('beasiswa.index')->with('success', 'Beasiswa berhasil ditambahkan.');
    }

    public function edit(Beasiswa $beasiswa)
    {
        return view('admin.beasiswa.form', compact('beasiswa'));
    }

    public function update(Request $request, Beasiswa $beasiswa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'kuota' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // hapus gambar lama jika ada
            if ($beasiswa->gambar && file_exists(public_path($beasiswa->gambar))) {
                unlink(public_path($beasiswa->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/beasiswa'), $filename);
            $validated['gambar'] = 'uploads/beasiswa/' . $filename;
        }

        $beasiswa->update($validated);

        return redirect()->route('beasiswa.index')->with('success', 'Beasiswa berhasil diperbarui.');
    }

    public function destroy(Beasiswa $beasiswa)
    {
        // hapus file fisik jika ada
        if ($beasiswa->gambar && file_exists(public_path($beasiswa->gambar))) {
            unlink(public_path($beasiswa->gambar));
        }

        $beasiswa->delete();
        return redirect()->route('beasiswa.index')->with('success', 'Beasiswa berhasil dihapus.');
    }
}
