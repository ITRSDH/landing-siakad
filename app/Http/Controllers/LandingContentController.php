<?php

namespace App\Http\Controllers;

use App\Models\LandingContent;
use Illuminate\Http\Request;

class LandingContentController extends Controller
{
    public function index()
    {
        $content = LandingContent::first();
        return view('admin.landingcontent.form', compact('content'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string',
            'hero_background' => 'nullable|file|mimes:jpg,jpeg,png,gif',
            'logo' => 'nullable|file|mimes:jpg,jpeg,png,gif',
            'jumlah_program_studi' => 'nullable|integer',
            'jumlah_mahasiswa' => 'nullable|integer',
            'jumlah_dosen' => 'nullable|integer',
            'jumlah_mitra' => 'nullable|integer',
            'nama_aplikasi' => 'nullable|string',
            'deskripsi_footer' => 'nullable|string',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string',
            'email' => 'nullable|email',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'youtube' => 'nullable|string',
            'keunggulan' => 'nullable|array',
        ]);

        // Folder tujuan di public/landing
        $uploadPath = public_path('uploads/landing');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Hero background
        if ($request->hasFile('hero_background')) {
            $file = $request->file('hero_background');
            $filename = time() . '_hero.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $data['hero_background'] = 'uploads/landing/' . $filename;
        }

        // Logo
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $data['logo'] = 'uploads/landing/' . $filename;
        }

        // Handle keunggulan
        if ($request->has('keunggulan')) {
            $keunggulan = $request->keunggulan;
            foreach ($keunggulan as $key => $item) {
                if (isset($item['icon']) && $item['icon'] instanceof \Illuminate\Http\UploadedFile) {
                    $file = $item['icon'];
                    $filename = time() . "_keunggulan_{$key}." . $file->getClientOriginalExtension();
                    $file->move($uploadPath, $filename);
                    $keunggulan[$key]['icon'] = 'uploads/landing/' . $filename;
                }
            }
            $data['keunggulan'] = json_encode($keunggulan);
        }

        // Save or update
        $content = LandingContent::first();
        if ($content) {
            $content->update($data);
        } else {
            LandingContent::create($data);
        }

        return redirect()->back()->with('success', 'Konten landing diperbarui.');
    }
}
