@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Detail Prodi -->
<div class="bg-gradient-to-br from-[#003366] to-[#001f4d] text-white text-center py-20 md:py-28 px-4 rounded-b-3xl shadow-lg">
    <h1 class="text-4xl md:text-5xl font-bold my-3 tracking-wide">Detail Program Studi</h1>
    <p class="text-lg opacity-90 max-w-2xl mx-auto">Informasi Lengkap Program Studi yang Anda Pilih</p>
</div>

<!-- Detail Section -->
<div class="max-w-5xl mx-auto py-16 px-6">
    @if($prodi)
    <h2 class="text-3xl font-bold text-[#003366] mb-6">{{ $prodi['nama_prodi'] ?? $prodi->nama_prodi ?? 'Program Studi' }}</h2>
    <p class="text-gray-600 leading-relaxed mb-8">
        {{ $prodi['deskripsi'] ?? $prodi->deskripsi ?? 'Deskripsi lengkap mengenai program studi ini belum tersedia.' }}
    </p>

    <!-- Info Grid -->
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Kurikulum -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6 hover:shadow-md transition">
            <h3 class="text-xl font-semibold text-[#003366] mb-3">Kurikulum</h3>
            <ul class="list-disc pl-5 text-gray-600 space-y-2">
                <li>Struktur Kurikulum Terbaru 2024</li>
                <li>Mata Kuliah Wajib dan Pilihan</li>
                <li>Program Magang dan Kerja Praktik</li>
                <li>Proyek Akhir dan Skripsi</li>
            </ul>
        </div>

        <!-- Fasilitas -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6 hover:shadow-md transition">
            <h3 class="text-xl font-semibold text-[#003366] mb-3">Fasilitas</h3>
            <ul class="list-disc pl-5 text-gray-600 space-y-2">
                <li>Laboratorium Kesehatan</li>
                <li>Ruang Belajar Digital</li>
                <li>Akses Jurnal Internasional</li>
                {{-- <li>Komunitas Coding & Startup</li> --}}
            </ul>
        </div>
    </div>

    <!-- Prestasi -->
    <div class="mt-12">
        <h3 class="text-2xl font-semibold text-[#003366] mb-4">Prestasi Mahasiswa</h3>
        @if($prestasi && $prestasi->count() > 0)
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($prestasi as $item)
                    <div class="bg-white border border-gray-100 rounded-xl p-5 shadow hover:shadow-lg transition">
                        <p class="font-medium text-gray-700">
                            {{ $item['judul_prestasi'] ?? $item->judul_prestasi ?? $item['judul'] ?? $item->judul ?? $item['title'] ?? $item->title ?? 'Prestasi' }}
                        </p>
                        <span class="text-sm text-gray-500">
                            {{ $item['deskripsi'] ?? $item->deskripsi ?? $item['description'] ?? $item->description ?? 'Prestasi mahasiswa' }}
                        </span>
                        @if(isset($item['nama_mahasiswa']) || isset($item->nama_mahasiswa))
                            <p class="text-xs text-gray-400 mt-2">
                                Oleh: {{ $item['nama_mahasiswa'] ?? $item->nama_mahasiswa }}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            {{-- <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white border border-gray-100 rounded-xl p-5 shadow hover:shadow-lg transition">
                    <p class="font-medium text-gray-700">Juara 1 Hackathon Nasional 2024</p>
                    <span class="text-sm text-gray-500">Bidang AI & Machine Learning</span>
                </div>
                <div class="bg-white border border-gray-100 rounded-xl p-5 shadow hover:shadow-lg transition">
                    <p class="font-medium text-gray-700">Finalis Gemastik 2023</p>
                    <span class="text-sm text-gray-500">Kategori Keamanan Siber</span>
                </div>
                <div class="bg-white border border-gray-100 rounded-xl p-5 shadow hover:shadow-lg transition">
                    <p class="font-medium text-gray-700">Publikasi Jurnal Internasional</p>
                    <span class="text-sm text-gray-500">IEEE & Scopus Indexed</span>
                </div>
            </div> --}}
        @endif
    </div>
    @else
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-8 text-center">
        <p class="text-gray-600 text-lg mb-4">Program Studi tidak ditemukan.</p>
        <a href="{{ route('programstudi.index') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
            Kembali ke Daftar Program Studi
        </a>
    </div>
    @endif

    {{-- Visi & Misi --}}
    <div class="mt-12">
        <h3 class="text-2xl font-semibold text-[#003366] mb-4">Visi dan Misi</h3>
        @if(isset($prodi['nama_prodi']) && $prodi['nama_prodi'] == 'Keperawatan')
            <div class="mt-4">
                <h4 class="text-xl font-semibold text-[#003366] mb-4">Visi</h4>
                <p class="text-lg text-gray-600">Menjadi Program Studi Yang Menghasilkan Lulusan Sarjana Keperawatan Yang Unggul Dibidang Keperawatan Gawat Darurat Dan Berjiwa Enterpreneur Pada Tahun 2030.</p>
            </div>
            <div class="mt-4">
                <h4 class="text-xl font-semibold text-[#003366] mb-4">Misi</h4>
                <ul class="list-disc list-inside text-lg text-gray-600">
                    <li>Menyelenggarakan pendidikan sarjana keperawatan melalui pembelajaran yang berkualitas</li>
                    <li>Terlaksananya proses pendidikan sesuai standar yang sudah ditetapkan</li>
                    <li>Terwujudnya hasil penelitian untuk meningkatkan pelayanan keperawatan dalam pengembangan ilmu keperawatan </li>
                    <li>Terlaksananya pengabdian masyarakat di bidang keperawatan yang bermanfaat bagi masyarakat</li>
                    <li>Terwujudnya sarana dan prasarana yang memadai untuk pendidikan dan penelitian di bidang keperawatan</li>
                </ul>
            </div>
        @elseif(isset($prodi['nama_prodi']) && $prodi['nama_prodi'] == 'Sarjana Keperawatan')
            <div class="mt-4">
                <h4 class="text-xl font-semibold text-[#003366] mb-4">Visi</h4>
                <p class="text-lg text-gray-600">Menjadi Program Studi Yang Menghasilkan Lulusan Sarjana Keperawatan Yang Unggul Dibidang Keperawatan Gawat Darurat Dan Berjiwa Enterpreneur Pada Tahun 2030.</p>
            </div>
            <div class="mt-4">
                <h4 class="text-xl font-semibold text-[#003366] mb-4">Misi</h4>
                <ul class="list-disc list-inside text-lg text-gray-600">
                    <li>Menyelenggarakan pendidikan sarjana keperawatan melalui pembelajaran yang berkualitas</li>
                    <li>Terlaksananya proses pendidikan sesuai standar yang sudah ditetapkan</li>
                    <li>Terwujudnya hasil penelitian untuk meningkatkan pelayanan keperawatan dalam pengembangan ilmu keperawatan </li>
                    <li>Terlaksananya pengabdian masyarakat di bidang keperawatan yang bermanfaat bagi masyarakat</li>
                    <li>Terwujudnya sarana dan prasarana yang memadai untuk pendidikan dan penelitian di bidang keperawatan</li>
                </ul>
            </div>
        @elseif(isset($prodi['nama_prodi']) && $prodi['nama_prodi'] == 'Kebidanan')
            <div class="mt-4">
                <h4 class="text-xl font-semibold text-[#003366] mb-4">Visi</h4>
                <p class="text-lg text-gray-600">Menjadi Program Studi DIII Kebidanan Yang Unggul Dalam Bidang Pelayanan KIA Di Komunitas Dan Berjiwa Entrepreneur Di Tahun 2030</p>
            </div>
            <div class="mt-4">
                <h4 class="text-xl font-semibold text-[#003366] mb-4">Misi</h4>
                <ul class="list-disc list-inside text-lg text-gray-600">
                    <li>Menyelenggarakan proses pendidikan bidan melalui pembelajaran berkualitas dan unggul dalam bidang pelayanan KIA di Komunitas</li>
                    <li>Menghasilkan tenaga bidan yang berjiwa entrepreneur</li>
                    <li>Menghasilkan penelitian yang berbasis pada pelayanan KIA di Komunitas yang berkelanjutan sesuai dengan perkembangan ilmu kebidanan </li>
                    <li>Mengimplementasikan pengabdian kepada masyarakat secara berkesinambungan yang berbasis pada pelayanan KIA di Komunitas berdasarkan perkembangan ilmu kebidanan</li>
                </ul>
            </div>
        @elseif(isset($prodi['nama_prodi']) && $prodi['nama_prodi'] == 'Profesi Ners')
            <div class="mt-4">
                <h4 class="text-xl font-semibold text-[#003366] mb-4">Visi</h4>
                <p class="text-lg text-gray-600">Menjadi Program Studi Yang Menghasilkan Lulusan Ners Yang Unggul Dibidang Keperawatan Gawat Darurat Dan Berjiwa Enterpreneur Pada Tahun 2030</p>
            </div>
            <div class="mt-4">
                <h4 class="text-xl font-semibold text-[#003366] mb-4">Misi</h4>
                <ul class="list-disc list-inside text-lg text-gray-600">
                    <li>Menyelenggarakan pendidikan profesi nersmelalui pembelajaran  yang berkualitas</li>
                    <li>Terlaksananya proses pendidikan sesuai standar yang sudah ditetapkan</li>
                    <li>Terwujudnya hasil penelitian untuk meningkatkan pelayanan keperawatan dan pengembangan ilmu keperawatan</li>
                    <li>Terlaksananya pengabdian masyarakat di bidang keperawatan yang bermanfaat bagi masyarakat</li>
                    <li>Terwujudnya jiwa entrepreneur kesehatan dan mampu menangani masalah keperawatan gawat darurat</li>
                </ul>
            </div>
        @elseif(isset($prodi['nama_prodi']) && $prodi['nama_prodi'] == 'Radiologi Pencitraan')
            <div class="mt-4">
                <h4 class="text-xl font-semibold text-[#003366] mb-4">Visi</h4>
                <p class="text-lg text-gray-600">Menjadikan Teknologi Radiologi Pencitraan Yang Unggul dalam Optimalisasi Teknik Radiologi Imejing Diagnostic Berfokus Pada Quality Control Dan Keselamatan Pasien (Patient Safety) Dipelayanan Kesehatan Serta Berjiwa Entrepreneur Tahun 2030</p>
            </div>
            <div class="mt-4">
                <h4 class="text-xl font-semibold text-[#003366] mb-4">Misi</h4>
                <ul class="list-disc list-inside text-lg text-gray-600">
                    <li>Menyelenggarakan pendidikan Teknik Radiologi Pencitraan Berfokus Pada Quality Control Dan Keselamatan Pasien (Patient Safety) Dipelayanan Kesehatan</li>
                    <li>Terlaksananya proses pendidikan sesuai standar yang sudah ditetapkan</li>
                    <li>Terwujudnya hasil penelitian untuk meningkatkan pelayanan keperawatan dan pengembangan ilmu keperawatan</li>
                    <li>Terlaksananya pengabdian masyarakat di bidang keperawatan yang bermanfaat bagi masyarakat</li>
                    <li>Terwujudnya jiwa entrepreneur kesehatan dan mampu menangani masalah keperawatan gawat darurat</li>
                </ul>
            </div>
        @endif

    </div>
</div>

<!-- CTA -->
<section
    class="relative bg-gradient-to-r from-[#003366] to-[#00509d] text-white py-20 px-6 rounded-3xl max-w-6xl mx-auto mb-20 text-center flex flex-col items-center justify-center shadow-xl">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">Tertarik dengan Program Studi Ini?</h2>
    <p class="text-lg max-w-2xl mx-auto opacity-90">Jadilah bagian dari komunitas teknologi dan inovasi kami.</p>
    <a href="#"
       class="inline-block bg-yellow-400 text-[#003366] font-semibold px-8 py-3 rounded-full mt-6 shadow-md hover:bg-yellow-500 hover:scale-105 transform transition">
        Daftar Sekarang
    </a>
</section>

@endsection
