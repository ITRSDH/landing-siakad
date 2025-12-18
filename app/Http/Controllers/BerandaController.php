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
use App\Services\FaqApiService;
use App\Services\GaleriApiService;
use App\Services\LandingApiService;
use App\Services\OrmawaApiService;
use App\Services\PengumumanApiService;
use App\Services\PrestasiApiService;
use App\Services\ProdiApiService;
use App\Services\ProfilApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BerandaController extends Controller
{
    public function index(GaleriApiService $galeriService, BeritaApiService $beritaService, PengumumanApiService $pengumumanService, LandingApiService $landingService, FaqApiService $faqService, ProdiApiService $prodiService)
    {
        // === GALERI: API first, database fallback ===
        $apiGaleris = $galeriService->getAllGaleri();
        if ($apiGaleris !== null && isset($apiGaleris['items'])) {
            $galeris = $apiGaleris['items']->take(6);
            Log::info('Using API data for Galeri in homepage');
        } else {
            Log::info('Using database fallback for Galeri in homepage');
            $galeris = Galeri::orderBy('created_at', 'desc')->take(6)->get();
        }

        // === FAQ: Database only (belum ada API service) ===
        $apiFaqs = $faqService->getAllFaq();
        if ($apiFaqs !== null) {
            $faqs = $apiFaqs;
            Log::info('Using API data for FAQ in homepage');
        } else {
            Log::info('Using database fallback for FAQ in homepage');
            $faqs = Faq::latest()->get();
        }

        // === BERITA: API first, database fallback ===
        $apiBerita = $beritaService->getAllBerita();
        if ($apiBerita !== null && isset($apiBerita['items'])) {
            $beritas = collect($apiBerita['items'])->take(5);
            Log::info('Using API data for Berita in homepage');
        } else {
            Log::info('Using database fallback for Berita in homepage');
            $beritas = Berita::latest()->take(5)->get();
        }

        $utama = $beritas->first();
        $lainnya = $beritas->skip(1);

        // === PENGUMUMAN: API first, database fallback ===
        $apiPengumuman = $pengumumanService->getAllPengumuman();
        if ($apiPengumuman !== null && isset($apiPengumuman['items'])) {
            $pengumumen = collect($apiPengumuman['items'])->take(5);
            Log::info('Using API data for Pengumuman in homepage');
        } else {
            Log::info('Using database fallback for Pengumuman in homepage');
            $pengumumen = Pengumuman::latest()->take(5)->get();
        }

        // === HERO/LANDING CONTENT: API first, database fallback ===
        $apiHero = $landingService->getActiveLandingKampus();
        if ($apiHero !== null) {
            $hero = $apiHero;
            Log::info('Using API data for Hero content in homepage', [
                'hero_title' => $apiHero->hero_title ?? 'N/A',
                'hero_subtitle' => $apiHero->hero_subtitle ?? 'N/A',
                'hero_background' => $apiHero->hero_background ?? 'N/A',
            ]);
        } else {
            Log::info('Using database fallback for Hero content in homepage');
            $hero = LandingContent::first();
        }

        // PRODI/LANDING CONTENT: API first, database fallback
        $apiProdi = $prodiService->getAllProdi();
        if ($apiProdi !== null) {
            $prodis = is_array($apiProdi) ? collect($apiProdi) : $apiProdi;
            Log::info('Using API data for Prodi in homepage', [
                'prodi_count' => $prodis->count(),
            ]);
        } else {
            Log::info('Using database fallback for Prodi in homepage');
            // $prodis = Prodi::all();
        }

        return view('landingbaru.branda', compact('galeris', 'faqs', 'utama', 'lainnya', 'pengumumen', 'hero', 'prodis'));
    }

    public function programStudi(ProdiApiService $prodiService)
    {
        $prodis = null;
        $apiResponse = $prodiService->getAllProdi();

        if ($apiResponse !== null) {
            // Response dari API adalah array langsung: [{id, nama_prodi, prestasi: [...]}, ...]
            if (is_array($apiResponse)) {
                $prodis = collect($apiResponse);
            }

            if ($prodis && $prodis->count() > 0) {
                Log::info('Using API data for Program Studi: ' . $prodis->count() . ' items');
            } else {
                Log::warning('API response empty for Program Studi');
                $prodis = null;
            }
        }

        if ($prodis === null) {
            Log::info('Using database fallback for Program Studi in homepage');
            // $prodis = Prodi::all();
        }

        return view('landingbaru.programstudi', compact('prodis'));
    }

    public function jadwal()
    {
        return view('landingbaru.jadwal');
    }

    public function ormawa(OrmawaApiService $ormawaService)
    {
        $currentPage = request()->get('page', 1);
        $apiData = $ormawaService->getAllOrmawa($currentPage);

        if ($apiData !== null && isset($apiData['items'])) {
            // API berhasil dengan pagination
            if (isset($apiData['pagination']) && $apiData['pagination'] !== null) {
                // Gunakan pagination dari API
                $pagination = $apiData['pagination'];
                $ormawas = new \Illuminate\Pagination\LengthAwarePaginator($apiData['items']->values(), $pagination['total'], $pagination['per_page'], $currentPage, [
                    'path' => route('landing.ormawa'),
                    'pageName' => 'page',
                    'query' => request()->query(),
                ]);

                Log::info('Using API Ormawa with pagination', [
                    'current_page' => $currentPage,
                    'total' => $pagination['total'],
                    'per_page' => $pagination['per_page'],
                    'items_count' => $apiData['items']->count(),
                ]);
            } else {
                // API berhasil tapi tanpa pagination, buat manual
                $perPage = 9;
                $total = $apiData['items']->count();
                $offset = ($currentPage - 1) * $perPage;
                $items = $apiData['items']->slice($offset, $perPage)->values();

                $ormawas = new \Illuminate\Pagination\LengthAwarePaginator($items, $total, $perPage, $currentPage, [
                    'path' => route('landing.ormawa'),
                    'pageName' => 'page',
                ]);

                Log::info('Using API Ormawa with manual pagination');
            }

            // Hitung kategori unik dari semua item (bukan hanya halaman saat ini)
            $kategoriList = $apiData['items']->pluck('kategori', 'kategori')->keys()->filter()->unique()->values()->toArray();

            return view('landingbaru.ormawa', compact('ormawas', 'kategoriList'));
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Ormawa data');
            $ormawas = Ormawa::latest()->paginate(9);
            $kategoriList = Ormawa::distinct()->pluck('kategori')->filter()->toArray();
            return view('landingbaru.ormawa', compact('ormawas', 'kategoriList'));
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
        $currentPage = request()->get('page', 1);
        $apiData = $beasiswaService->getAllBeasiswa($currentPage);

        if ($apiData !== null && isset($apiData['items'])) {
            // API berhasil dengan pagination
            if (isset($apiData['pagination']) && $apiData['pagination'] !== null) {
                // Gunakan pagination dari API
                $pagination = $apiData['pagination'];
                $beasiswas = new \Illuminate\Pagination\LengthAwarePaginator($apiData['items']->values(), $pagination['total'], $pagination['per_page'], $currentPage, [
                    'path' => route('landing.beasiswa'),
                    'pageName' => 'page',
                    'query' => request()->query(),
                ]);

                Log::info('Using API Beasiswa with pagination', [
                    'current_page' => $currentPage,
                    'total' => $pagination['total'],
                    'per_page' => $pagination['per_page'],
                    'items_count' => $apiData['items']->count(),
                ]);
            } else {
                // API berhasil tapi tanpa pagination, buat manual
                $perPage = 9;
                $total = $apiData['items']->count();
                $offset = ($currentPage - 1) * $perPage;
                $items = $apiData['items']->slice($offset, $perPage)->values();

                $prestasis = new \Illuminate\Pagination\LengthAwarePaginator($items, $total, $perPage, $currentPage, [
                    'path' => route('landing.beasiswa'),
                    'pageName' => 'page',
                ]);

                Log::info('Using API Beasiswa with manual pagination');
            }

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
        $currentPage = request()->get('page', 1);
        $apiData = $prestasiService->getAllPrestasi($currentPage);

        if ($apiData !== null && isset($apiData['items'])) {
            // API berhasil dengan pagination
            if (isset($apiData['pagination']) && $apiData['pagination'] !== null) {
                // Gunakan pagination dari API
                $pagination = $apiData['pagination'];
                $prestasis = new \Illuminate\Pagination\LengthAwarePaginator($apiData['items']->values(), $pagination['total'], $pagination['per_page'], $currentPage, [
                    'path' => route('landing.prestasi'),
                    'pageName' => 'page',
                    'query' => request()->query(),
                ]);

                Log::info('Using API Prestasi with pagination', [
                    'current_page' => $currentPage,
                    'total' => $pagination['total'],
                    'per_page' => $pagination['per_page'],
                    'items_count' => $apiData['items']->count(),
                ]);
            } else {
                // API berhasil tapi tanpa pagination, buat manual
                $perPage = 9;
                $total = $apiData['items']->count();
                $offset = ($currentPage - 1) * $perPage;
                $items = $apiData['items']->slice($offset, $perPage)->values();

                $prestasis = new \Illuminate\Pagination\LengthAwarePaginator($items, $total, $perPage, $currentPage, [
                    'path' => route('landing.prestasi'),
                    'pageName' => 'page',
                ]);

                Log::info('Using API Prestasi with manual pagination');
            }

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

    public function detailProdi($id, ProdiApiService $prodiService)
    {
        $prodi = null;
        $prestasi = null;
        $apiResponse = $prodiService->getProdiById($id);

        if ($apiResponse !== null) {
            // Response structure dari API: {prodi: {...}, prestasi: [...]}
            if (is_array($apiResponse)) {
                $prodi = $apiResponse['prodi'] ?? null;
                $prestasi = collect($apiResponse['prestasi'] ?? []);
            } elseif (is_object($apiResponse)) {
                $prodi = $apiResponse->prodi ?? null;
                $prestasi = collect($apiResponse->prestasi ?? []);
            }

            if ($prodi) {
                Log::info('Using API data for Prodi detail, ID: ' . $id);
            } else {
                Log::warning('API response missing prodi field for ID: ' . $id);
            }
        }

        if ($prodi === null) {
            Log::info('Using database fallback for Prodi detail, ID: ' . $id);
            // $prodi = Prodi::findOrFail($id);
        }

        return view('landingbaru.detailprodi', compact('prodi', 'prestasi'));
    }

    public function pengumuman(Request $request, PengumumanApiService $pengumumanService)
    {
        $currentPage = request()->get('page', 1);
        $apiData = $pengumumanService->getAllPengumuman($currentPage);

        if ($apiData !== null && isset($apiData['items'])) {
            // API berhasil dengan pagination
            if (isset($apiData['pagination']) && $apiData['pagination'] !== null) {
                // Gunakan pagination dari API
                $pagination = $apiData['pagination'];
                $pengumuman = new \Illuminate\Pagination\LengthAwarePaginator($apiData['items']->values(), $pagination['total'], $pagination['per_page'], $currentPage, [
                    'path' => route('pengumumans.index'),
                    'pageName' => 'page',
                    'query' => request()->query(),
                ]);

                Log::info('Using API Pengumuman with pagination', [
                    'current_page' => $currentPage,
                    'total' => $pagination['total'],
                    'per_page' => $pagination['per_page'],
                    'items_count' => $apiData['items']->count(),
                ]);
            } else {
                // API berhasil tapi tanpa pagination, buat manual
                $perPage = 9;
                $total = $apiData['items']->count();
                $offset = ($currentPage - 1) * $perPage;
                $items = $apiData['items']->slice($offset, $perPage)->values();

                $pengumuman = new \Illuminate\Pagination\LengthAwarePaginator($items, $total, $perPage, $currentPage, [
                    'path' => route('pengumumans.index'),
                    'pageName' => 'page',
                ]);

                Log::info('Using API Pengumuman with manual pagination');
            }

            // Hitung kategori unik dari semua item (bukan hanya halaman saat ini)
            $kategoriList = $apiData['items']->pluck('kategori', 'kategori')->keys()->filter()->unique()->values()->toArray();

            return view('landingbaru.pengumuman', compact('pengumuman', 'kategoriList'));
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Pengumuman data');
            $pengumuman = Pengumuman::latest()->paginate(9);
            $kategoriList = Pengumuman::distinct()->pluck('kategori')->filter()->toArray();
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
            $recent = $allApiData && isset($allApiData['items']) ? collect($allApiData['items'])->take(3) : collect();

            return view('landingbaru.detailpengumuman', [
                'pengumuman' => $apiData,
                'recent' => $recent,
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
        $currentPage = request()->get('page', 1);
        $apiData = $beritaService->getAllBerita($currentPage);

        if ($apiData !== null && isset($apiData['items'])) {
            // API berhasil dengan pagination
            if (isset($apiData['pagination']) && $apiData['pagination'] !== null) {
                // Gunakan pagination dari API
                $pagination = $apiData['pagination'];
                $beritas = new \Illuminate\Pagination\LengthAwarePaginator($apiData['items']->values(), $pagination['total'], $pagination['per_page'], $currentPage, [
                    'path' => route('landing.berita'),
                    'pageName' => 'page',
                    'query' => request()->query(),
                ]);

                Log::info('Using API Berita with pagination', [
                    'current_page' => $currentPage,
                    'total' => $pagination['total'],
                    'per_page' => $pagination['per_page'],
                    'items_count' => $apiData['items']->count(),
                ]);
            } else {
                // API berhasil tapi tanpa pagination, buat manual
                $perPage = 9;
                $total = $apiData['items']->count();
                $offset = ($currentPage - 1) * $perPage;
                $items = $apiData['items']->slice($offset, $perPage)->values();

                $beritas = new \Illuminate\Pagination\LengthAwarePaginator($items, $total, $perPage, $currentPage, [
                    'path' => route('landing.berita'),
                    'pageName' => 'page',
                ]);

                Log::info('Using API Berita with manual pagination');
            }

            // Hitung kategori unik dari semua item (bukan hanya halaman saat ini)
            $kategoriList = $apiData['items']->pluck('kategori', 'kategori')->keys()->filter()->unique()->values()->toArray();

            return view('landingbaru.berita', compact('beritas', 'kategoriList'));
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Berita data');
            $beritas = Berita::latest()->paginate(9);
            $kategoriList = Berita::distinct()->pluck('kategori')->filter()->toArray();
            return view('landingbaru.berita', compact('beritas', 'kategoriList'));
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
        $currentPage = request()->get('page', 1);
        $apiData = $galeriService->getAllGaleri($currentPage);

        if ($apiData !== null && isset($apiData['items'])) {
            // API berhasil dengan pagination
            if (isset($apiData['pagination']) && $apiData['pagination'] !== null) {
                // Gunakan pagination dari API
                $pagination = $apiData['pagination'];
                $galeris = new \Illuminate\Pagination\LengthAwarePaginator($apiData['items']->values(), $pagination['total'], $pagination['per_page'], $currentPage, [
                    'path' => route('landing.galeri.index'),
                    'pageName' => 'page',
                    'query' => request()->query(),
                ]);

                Log::info('Using API Galeri with pagination', [
                    'current_page' => $currentPage,
                    'total' => $pagination['total'],
                    'per_page' => $pagination['per_page'],
                    'items_count' => $apiData['items']->count(),
                ]);
            } else {
                // API berhasil tapi tanpa pagination, buat manual
                $perPage = 9;
                $total = $apiData['items']->count();
                $offset = ($currentPage - 1) * $perPage;
                $items = $apiData['items']->slice($offset, $perPage)->values();

                $galeris = new \Illuminate\Pagination\LengthAwarePaginator($items, $total, $perPage, $currentPage, [
                    'path' => route('landing.galeri.index'),
                    'pageName' => 'page',
                ]);

                Log::info('Using API Galeri with manual pagination');
            }

            // Hitung kategori unik dari semua item (bukan hanya halaman saat ini)
            $kategoriList = $apiData['items']->pluck('kategori', 'kategori')->keys()->filter()->unique()->values()->toArray();

            return view('landingbaru.galeri', compact('galeris', 'kategoriList'));
        } else {
            // Fallback ke database jika API gagal
            Log::info('Using database fallback for Galeri data');
            $galeris = Galeri::latest()->paginate(9);
            $kategoriList = Galeri::distinct()->pluck('kategori')->filter()->toArray();
            return view('landingbaru.galeri', compact('galeris', 'kategoriList'));
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
            $galeris = $apiGaleriData['items']->take(8);
            Log::info('Using API data for Galeri in Kampus page');
        } else {
            // Fallback ke database untuk galeri
            Log::info('Using database fallback for Galeri in Kampus page');
            $galeris = Galeri::latest()->take(8)->get();
        }

        // Kirim data ke view
        return view('landingbaru.kampus', compact('profil', 'galeris'));
    }

    public function testHomepageApiConnections(GaleriApiService $galeriService, BeritaApiService $beritaService, PengumumanApiService $pengumumanService, LandingApiService $landingService)
    {
        $results = [
            'timestamp' => now(),
            'apis' => [],
        ];

        // Test Galeri API
        $results['apis']['galeri'] = [
            'connection' => $galeriService->testConnection(),
            'data_available' => $galeriService->getAllGaleri() !== null,
            'fallback_count' => Galeri::count(),
        ];

        // Test Berita API
        $results['apis']['berita'] = [
            'connection' => $beritaService->testConnection(),
            'data_available' => $beritaService->getAllBerita() !== null,
            'fallback_count' => Berita::count(),
        ];

        // Test Pengumuman API
        $results['apis']['pengumuman'] = [
            'connection' => $pengumumanService->testConnection(),
            'data_available' => $pengumumanService->getAllPengumuman() !== null,
            'fallback_count' => Pengumuman::count(),
        ];

        // Test Landing/Hero API
        $results['apis']['landing'] = [
            'connection' => $landingService->testConnection(),
            'data_available' => $landingService->getActiveLandingKampus() !== null,
            'fallback_count' => LandingContent::count(),
        ];

        // Test FAQ (database only)
        $results['apis']['faq'] = [
            'api_available' => false,
            'note' => 'Using database only - no API service',
            'database_count' => Faq::count(),
        ];

        return response()->json($results, 200, [], JSON_PRETTY_PRINT);
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
            'database_data' => \App\Models\ProfilKampus::first(),
        ];

        $results['galeri_data'] = [
            'api_data' => $galeriService->getAllGaleri(),
            'database_data' => \App\Models\Galeri::latest()->take(8)->get(),
        ];

        // Return as JSON for easy debugging
        return response()->json($results, 200, [], JSON_PRETTY_PRINT);
    }
}
