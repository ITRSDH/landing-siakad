<?php

namespace App\Http\Controllers;

use App\Models\ProfilKampus;
use Illuminate\Http\Request;

class ProfilKampusController extends Controller
{
    public function index()
    {
        $profil = ProfilKampus::first();
        return view('admin.profilekampus.index', compact('profil'));
    }

    public function edit()
    {
        $profil = ProfilKampus::first();
        return view('admin.profilekampus.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = ProfilKampus::first() ?? new ProfilKampus();

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'fasilitas' => 'nullable|array',
            'fasilitas.*.nama' => 'nullable|string',
            'fasilitas.*.deskripsi' => 'nullable|string',
            'struktur_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload manual tanpa Storage facade
        if ($request->hasFile('struktur_image')) {
            $file = $request->file('struktur_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('struktur');

            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            if (!empty($profil->struktur_image) && file_exists(public_path('struktur/' . $profil->struktur_image))) {
                unlink(public_path('struktur/' . $profil->struktur_image));
            }

            $file->move($destination, $filename);
            $validated['struktur_image'] = $filename;
        }

        // Encode fasilitas ke JSON
        $validated['fasilitas'] = isset($validated['fasilitas'])
            ? json_encode($validated['fasilitas'])
            : $profil->fasilitas;

        $profil->fill($validated)->save();

        return redirect()->route('kampus.index')->with('success', 'Profil kampus berhasil diperbarui!');
    }
}
