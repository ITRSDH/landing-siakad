<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // Tampilkan semua galeri
    public function index()
    {
        $galeris = Galeri::latest()->paginate(12);
        return view('admin.galeri.index', compact('galeris'));
    }

    // Form tambah
    public function create()
    {
        return view('admin.galeri.form');
    }

    // Simpan galeri baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'gambar.*' => 'nullable|image|max:4096',
        ]);

        $gambarArray = [];
        if($request->hasFile('gambar')){
            foreach($request->file('gambar') as $file){
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('images/galeri'), $filename);
                $gambarArray[] = 'images/galeri/'.$filename; // simpan path lengkap relatif ke public
            }
        }

        $data['gambar'] = $gambarArray;

        Galeri::create($data);

        return redirect()->route('galeri.index')->with('success', 'Galeri ditambahkan.');
    }

    // Form edit
    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.form', compact('galeri'));
    }

    // Update galeri
 public function update(Request $request, Galeri $galeri)
{
    $data = $request->validate([
        'judul' => 'required|string|max:255',
        'kategori' => 'nullable|string|max:100',
        'deskripsi' => 'nullable|string',
        'tanggal' => 'nullable|date',
        'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
    ]);

    // Jika ada gambar baru diupload
    if ($request->hasFile('gambar')) {
        // 🔹 Hapus gambar lama dari folder public/images/galeri
        if (!empty($galeri->gambar)) {
            foreach ($galeri->gambar as $oldImage) {
                $path = public_path($oldImage);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        // 🔹 Upload gambar baru
        $gambarBaru = [];
        foreach ($request->file('gambar') as $file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/galeri'), $filename);
            $gambarBaru[] = 'images/galeri/' . $filename;
        }

        $data['gambar'] = $gambarBaru;
    } else {
        // Jika tidak upload gambar baru, gunakan gambar lama
        $data['gambar'] = $galeri->gambar;
    }

    $galeri->update($data);

    return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
}


    // Hapus galeri
    public function destroy(Galeri $galeri)
    {
        if($galeri->gambar){
            foreach($galeri->gambar as $img){
                $path = public_path($img); // gunakan path lengkap
                if(file_exists($path)){
                    unlink($path);
                }
            }
        }

        $galeri->delete();
        return back()->with('success', 'Galeri dihapus.');
    }
}
