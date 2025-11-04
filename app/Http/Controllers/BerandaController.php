<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Berita;
use App\Models\Faq;
use App\Models\Galeri;
use App\Models\LandingContent;
use App\Models\Ormawa;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\ProfilKampus;
use App\Services\BeasiswaApiService;
use App\Services\BeritaApiService;
use App\Services\GaleriApiService;
use App\Services\OrmawaApiService;
use App\Services\PengumumanApiService;
use App\Services\PrestasiApiService;
use App\Services\ProfilApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil 6 galeri terbaru untuk ditampilkan di beranda
        $galeris = Galeri::orderBy('created_at', 'desc')->take(6)->get();
       $faqs = Faq::latest()->get();
         $beritas = Berita::latest()->take(5)->get();
        $utama = $beritas->first();
        $lainnya = $beritas->skip(1);
        $pengumumen = Pengumuman::latest()->take(5)->get();
        $hero = LandingContent::first(); 
        return view('landingbaru.branda', compact('galeris','faqs', 'utama', 'lainnya', 'pengumumen', 'hero'));
    }

    public function programStudi()
    {
        return view('landingbaru.programstudi');
    }

    public function jadwal()
    {
        return view('landingbaru.jadwal');
    }

    public function ormawa(OrmawaApiService $ormawaService)
    {
        // Coba ambil data dari API terlebih dahulu
        $apiData = $ormawaService->getAllOrmawa();
        
        if ($apiData !== null) {
            // Jika API berhasil, gunakan data dari API dengan pagination manual
            $perPage = 9;
            $currentPage = request()->get('page', 1);
            $total = $apiData->count();
            $offset = ($currentPage - 1) * $perPage;
            $items = $apiData->slice($offset, $perPage)->values();
            
            // Buat paginator manual
            $ormawas = new \Illuminate\Pagination\LengthAwarePaginator(
                $items,
                $total,
                $perPage,
                $currentPage,
                [
                    'path' => request()->url(),
                    'pageName' => 'page',
                ]
            );
            
            return view('landingbaru.ormawa', compact('ormawas'));
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Ormawa data');
            $ormawas = Ormawa::latest()->paginate(9);
            return view('landingbaru.ormawa', compact('ormawas'));
        }
    }

    // Halaman detail Ormawa
    public function detailOrmawa($id, OrmawaApiService $ormawaService)
    {
        // Coba ambil data dari API terlebih dahulu
        $apiData = $ormawaService->getOrmawaById($id);
        
        if ($apiData !== null) {
            // Jika API berhasil, gunakan data dari API
            return view('landingbaru.detailormawa', ['ormawa' => $apiData]);
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Ormawa detail, ID: ' . $id);
            $ormawa = Ormawa::findOrFail($id);
            return view('landingbaru.detailormawa', compact('ormawa'));
        }
    }

   public function beasiswa(BeasiswaApiService $beasiswaService)
    {
        $apiData = $beasiswaService->getAllBeasiswa();
         if ($apiData !== null) {
            // Jika API berhasil, gunakan data dari API dengan pagination manual
            $perPage = 9;
            $currentPage = request()->get('page', 1);
            $total = $apiData->count();
            $offset = ($currentPage - 1) * $perPage;
            $items = $apiData->slice($offset, $perPage)->values();
            
            // Buat paginator manual
            $beasiswas = new \Illuminate\Pagination\LengthAwarePaginator(
                $items,
                $total,
                $perPage,
                $currentPage,
                [
                    'path' => request()->url(),
                    'pageName' => 'page',
                ]
            );

            return view('landingbaru.beasiswa', compact('beasiswas'));
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Beasiswa data');
            $beasiswas = Beasiswa::latest()->paginate(9);
            return view('landingbaru.beasiswa', compact('beasiswas'));
        }
    }

    public function detailBeasiswa($id, BeasiswaApiService $beasiswaService)
    {
        $apiData = $beasiswaService->getBeasiswaById($id);

        if ($apiData !== null) {
            return view('landingbaru.detailbeasiswa', ['beasiswa' => $apiData]);
        } else {
            Log::info('Using database fallback for Beasiswa detail, ID: ' . $id);
            $beasiswa = Beasiswa::findOrFail($id);
            return view('landingbaru.detailbeasiswa', compact('beasiswa'));
        }
    }

    public function prestasi(PrestasiApiService $prestasiService)
    {
        $apiData = $prestasiService->getAllPrestasi();
         if ($apiData !== null) {
            // Jika API berhasil, gunakan data dari API dengan pagination manual
            $perPage = 9;
            $currentPage = request()->get('page', 1);
            $total = $apiData->count();
            $offset = ($currentPage - 1) * $perPage;
            $items = $apiData->slice($offset, $perPage)->values();
            
            // Buat paginator manual
            $prestasis = new \Illuminate\Pagination\LengthAwarePaginator(
                $items,
                $total,
                $perPage,
                $currentPage,
                [
                    'path' => request()->url(),
                    'pageName' => 'page',
                ]
            );

            return view('landingbaru.prestasimahasiswa', compact('prestasis'));
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Prestasi data');
            $prestasis = Prestasi::latest()->paginate(9);
            return view('landingbaru.prestasimahasiswa', compact('prestasis'));
        }
    }

    public function detailPrestasi($id, PrestasiApiService $prestasiService)
    {
        $apiData = $prestasiService->getPrestasiById($id);

        if ($apiData !== null) {
            return view('landingbaru.detailprestasi', ['prestasi' => $apiData]);
        } else {
            Log::info('Using database fallback for Prestasi detail, ID: ' . $id);
            $prestasi = Prestasi::findOrFail($id);
            return view('landingbaru.detailprestasi', compact('prestasi'));
        }
    }

    public function kontak()
    {
        return view('landingbaru.kontak');
    }

    public function pembayaran()
    {
        return view('landingbaru.pembayaran');
    }

    public function transkrip()
    {
        return view('landingbaru.transkip');
    }

    public function detailProdi()
    {
        return view('landingbaru.detailprodi');
    }
   
    public function pengumuman(Request $request, PengumumanApiService $pengumumanService)
    {
        // Coba ambil data dari API terlebih dahulu
        $apiData = $pengumumanService->getAllPengumuman();
        
        if ($apiData !== null) {
            // Filter API data berdasarkan request
            $filteredData = $apiData;
            
            // Filter pencarian
            if ($request->filled('q')) {
                $searchTerm = strtolower($request->q);
                $filteredData = $filteredData->filter(function($item) use ($searchTerm) {
                    $judul = strtolower($item->judul ?? $item->title ?? '');
                    $isi = strtolower($item->isi ?? $item->content ?? '');
                    return str_contains($judul, $searchTerm) || str_contains($isi, $searchTerm);
                });
            }
            
            // Filter kategori
            if ($request->filled('kategori') && $request->kategori != 'Semua Kategori') {
                $filteredData = $filteredData->filter(function($item) use ($request) {
                    return ($item->kategori ?? $item->category ?? '') == $request->kategori;
                });
            }
            
            // Pagination manual untuk API data
            $perPage = 6;
            $currentPage = request()->get('page', 1);
            $total = $filteredData->count();
            $offset = ($currentPage - 1) * $perPage;
            $items = $filteredData->slice($offset, $perPage)->values();
            
            // Buat paginator manual
            $pengumuman = new \Illuminate\Pagination\LengthAwarePaginator(
                $items,
                $total,
                $perPage,
                $currentPage,
                [
                    'path' => request()->url(),
                    'pageName' => 'page',
                ]
            );
            
            // Ambil kategori dari API data untuk filter sidebar
            $kategoriList = $apiData->pluck('kategori')
                ->merge($apiData->pluck('category'))
                ->filter()
                ->unique()
                ->values();
                
            return view('landingbaru.pengumuman', compact('pengumuman', 'kategoriList'));
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Pengumuman data');
            
            $query = Pengumuman::query();

            // Filter pencarian
            if ($request->filled('q')) {
                $query->where('judul', 'like', '%' . $request->q . '%');
            }

            // Filter kategori
            if ($request->filled('kategori') && $request->kategori != 'Semua Kategori') {
                $query->where('kategori', $request->kategori);
            }

            $pengumuman = $query->orderBy('tanggal', 'desc')->paginate(6);

            // Ambil kategori unik untuk filter sidebar
            $kategoriList = Pengumuman::select('kategori')
                ->distinct()
                ->pluck('kategori');

            return view('landingbaru.pengumuman', compact('pengumuman', 'kategoriList'));
        }
    }

    public function detailPengumuman($id, PengumumanApiService $pengumumanService)
    {
        // Coba ambil data dari API terlebih dahulu
        $apiData = $pengumumanService->getPengumumanById($id);
        
        if ($apiData !== null) {
            // Jika API berhasil, ambil recent dari API juga
            $allApiData = $pengumumanService->getAllPengumuman();
            $recent = $allApiData ? $allApiData->take(3) : collect();
            
            return view('landingbaru.detailpengumuman', [
                'pengumuman' => $apiData,
                'recent' => $recent
            ]);
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Pengumuman detail, ID: ' . $id);
            $pengumuman = Pengumuman::findOrFail($id);
            $recent = Pengumuman::orderBy('tanggal', 'desc')->take(3)->get();

            return view('landingbaru.detailpengumuman', compact('pengumuman', 'recent'));
        }
    }

    public function berita(BeritaApiService $beritaService)
    {
        // Coba ambil data dari API terlebih dahulu
        $apiData = $beritaService->getAllBerita();
        
        if ($apiData !== null) {
            // Jika API berhasil, gunakan data dari API dengan pagination manual
            $perPage = 6;
            $currentPage = request()->get('page', 1);
            $total = $apiData->count();
            $offset = ($currentPage - 1) * $perPage;
            $items = $apiData->slice($offset, $perPage)->values();
            
            // Buat paginator manual
            $beritas = new \Illuminate\Pagination\LengthAwarePaginator(
                $items,
                $total,
                $perPage,
                $currentPage,
                [
                    'path' => request()->url(),
                    'pageName' => 'page',
                ]
            );
            
            return view('landingbaru.berita', compact('beritas'));
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Berita data');
            $beritas = Berita::latest()->paginate(6);
            return view('landingbaru.berita', compact('beritas'));
        }
    }

    public function detailBerita($id, BeritaApiService $beritaService)
    {
        // Coba ambil data dari API terlebih dahulu
        $apiData = $beritaService->getBeritaById($id);
        
        if ($apiData !== null) {
            // Jika API berhasil, gunakan data dari API
            return view('landingbaru.detailberita', ['berita' => $apiData]);
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Berita detail, ID: ' . $id);
            $berita = Berita::findOrFail($id);
            return view('landingbaru.detailberita', compact('berita'));
        }
    }

     public function galeri(Request $request, GaleriApiService $galeriService)
    {
        // Coba ambil data dari API terlebih dahulu
        $apiData = $galeriService->getAllGaleri();
        
        if ($apiData !== null) {
            // Jika API berhasil, proses filtering pada data API
            $filteredData = $apiData;
            
            $search = $request->get('search');
            $sort = $request->get('sort', 'newest'); // default: terbaru

            // Filter pencarian berdasarkan judul
            if ($search) {
                $searchTerm = strtolower($search);
                $filteredData = $filteredData->filter(function($item) use ($searchTerm) {
                    $judul = strtolower($item->judul ?? $item->title ?? '');
                    $deskripsi = strtolower($item->deskripsi ?? $item->description ?? '');
                    return str_contains($judul, $searchTerm) || str_contains($deskripsi, $searchTerm);
                });
            }

            // Sort data API
            switch ($sort) {
                case 'oldest':
                    $filteredData = $filteredData->sortBy(function($item) {
                        return $item->tanggal ?? $item->date ?? $item->created_at ?? '1970-01-01';
                    });
                    break;
                case 'name_asc':
                    $filteredData = $filteredData->sortBy(function($item) {
                        return $item->judul ?? $item->title ?? '';
                    });
                    break;
                case 'name_desc':
                    $filteredData = $filteredData->sortByDesc(function($item) {
                        return $item->judul ?? $item->title ?? '';
                    });
                    break;
                case 'newest':
                default:
                    $filteredData = $filteredData->sortByDesc(function($item) {
                        return $item->tanggal ?? $item->date ?? $item->created_at ?? '1970-01-01';
                    });
            }

            // Convert ke array untuk pagination
            $galeris = $filteredData->values();
            
            return view('landingbaru.galeri', compact('galeris', 'search', 'sort'));
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Galeri data');
            
            $search = $request->get('search');
            $sort = $request->get('sort', 'newest'); // default: terbaru

            // Query builder
            $query = Galeri::query();

            // Filter pencarian berdasarkan judul
            if ($search) {
                $query->where('judul', 'like', '%' . $search . '%');
            }

            // Sort berdasarkan timestamp Laravel
            switch ($sort) {
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'name_asc':
                    $query->orderBy('judul', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('judul', 'desc');
                    break;
                case 'newest':
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }

            $galeris = $query->get(); // Ambil semua data

            return view('landingbaru.galeri', compact('galeris', 'search', 'sort'));
        }
    }

    public function detailGaleri($id, GaleriApiService $galeriService)
    {
        // Coba ambil data dari API terlebih dahulu
        $apiData = $galeriService->getGaleriById($id);
        
        if ($apiData !== null) {
            // Jika API berhasil, gunakan data dari API
            return view('landingbaru.detailgaleri', ['galeri' => $apiData]);
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Galeri detail, ID: ' . $id);
            $galeri = Galeri::findOrFail($id);
            return view('landingbaru.detailgaleri', compact('galeri'));
        }
    }

    public function kalender()
    {
        return view('landingbaru.kalender');
    }

    public function kampus(ProfilApiService $profilService, GaleriApiService $galeriService)
    {
        // Coba ambil data profil kampus dari API terlebih dahulu
        // Gunakan getActiveProfilKampus() untuk mendapatkan profil yang sedang aktif
        $apiProfilData = $profilService->getActiveProfilKampus();
        
        if ($apiProfilData !== null) {
            // Jika API berhasil, gunakan data dari API
            $profil = $apiProfilData;
            Log::info('Using API data for Profil Kampus');
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Profil Kampus data');
            $profil = ProfilKampus::first();
        }

        // Untuk galeri, coba ambil dari API dulu, fallback ke database
        $apiGaleriData = $galeriService->getAllGaleri();
        
        if ($apiGaleriData !== null) {
            // Jika API berhasil, ambil 8 data terbaru
            $galeris = $apiGaleriData->take(8);
            Log::info('Using API data for Galeri in Kampus page');
        } else {
            // Fallback ke database untuk galeri
            Log::info('Using database fallback for Galeri in Kampus page');
            $galeris = Galeri::latest()->take(8)->get();
        }

        // Kirim data ke view
        return view('landingbaru.kampus', compact('profil', 'galeris'));
    }

    public function testKampusConnection(ProfilApiService $profilService, GaleriApiService $galeriService)
    {
        $results = [];
        
        // Test Profil API Connection
        $results['profil_api'] = $profilService->testConnection();
        
        // Test Galeri API Connection
        $results['galeri_api'] = $galeriService->testConnection();
        
        // Test getting actual data
        $results['profil_data'] = [
            'api_data' => $profilService->getActiveProfilKampus(),
            'database_data' => \App\Models\ProfilKampus::first()
        ];
        
        $results['galeri_data'] = [
            'api_data' => $galeriService->getAllGaleri(),
            'database_data' => \App\Models\Galeri::latest()->take(8)->get()
        ];
        
        // Return as JSON for easy debugging
        return response()->json($results, 200, [], JSON_PRETTY_PRINT);
    }
}
