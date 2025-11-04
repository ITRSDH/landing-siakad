@extends("landingbaru.layout.appbranda")

@section('content')
<section class="bg-gradient-to-br from-gray-50 via-white to-gray-100 p-6 ">
<div class="max-w-5xl mx-auto mt-16">
    <!-- Profil Mahasiswa -->
    <div class="bg-white/80 backdrop-blur-sm  rounded-2xl p-8 border border-gray-200">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
            <!-- Foto Profil -->
            <div class="relative">
                <img src="https://picsum.photos/200" alt="Foto Mahasiswa" class="w-40 h-40 rounded-2xl object-cover shadow-md border border-gray-200">
                <span class="absolute bottom-2 right-2 px-2 py-1 text-xs bg-green-500 text-white rounded-lg shadow">Aktif</span>
            </div>

            <!-- Detail Mahasiswa -->
            <div class="flex-1">
                <h1 class="text-2xl font-bold text-gray-800">Rudi Hartono</h1>
                <p class="text-sm text-gray-600">NIM: <span class="font-medium">202310123</span></p>
                <p class="text-sm text-gray-600 mt-1">Program Studi: <span class="font-medium">Sistem Informasi (S1)</span></p>
                <p class="text-sm text-gray-600 mt-1">Fakultas: <span class="font-medium">Teknologi Informasi</span></p>
                <p class="text-sm text-gray-600 mt-1">Semester: <span class="font-medium">5 (Ganjil 2024/2025)</span></p>

                <!-- Kontak -->
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="p-3 rounded-xl bg-gray-50 border border-gray-100">
                        <p class="text-xs text-gray-500">Email</p>
                        <p class="font-medium text-gray-700">rudi.hartono@contoh.ac.id</p>
                    </div>
                    <div class="p-3 rounded-xl bg-gray-50 border border-gray-100">
                        <p class="text-xs text-gray-500">Telepon</p>
                        <p class="font-medium text-gray-700">+62 812 3456 7890</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Akademik -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-5 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl border border-indigo-100">
                <p class="text-xs text-gray-500">IPK</p>
                <p class="text-2xl font-bold text-indigo-600">3.45</p>
            </div>
            <div class="p-5 bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl border border-green-100">
                <p class="text-xs text-gray-500">Total SKS</p>
                <p class="text-2xl font-bold text-green-600">95</p>
            </div>
            <div class="p-5 bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl border border-yellow-100">
                <p class="text-xs text-gray-500">Status</p>
                <p class="text-2xl font-bold text-orange-600">Aktif</p>
            </div>
        </div>
    </div>

    <!-- Transkrip Nilai -->
    <div class="bg-white/80 backdrop-blur-sm  rounded-2xl p-8 border border-gray-200 mt-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Transkrip Nilai</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gradient-to-r from-indigo-50 to-indigo-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border   ">Kode MK</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border">Mata Kuliah</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700 border">SKS</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700 border">Nilai</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-600 border">IF101</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border">Pengantar Informatika</td>
                        <td class="px-4 py-2 text-center text-gray-700 border">3</td>
                        <td class="px-4 py-2 text-center font-semibold text-green-600 border">A</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-600 border">IF203</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border">Struktur Data</td>
                        <td class="px-4 py-2 text-center text-gray-700 border">3</td>
                        <td class="px-4 py-2 text-center font-semibold text-green-600 border">A-</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-600 border">IF305</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border">Basis Data</td>
                        <td class="px-4 py-2 text-center text-gray-700 border">3</td>
                        <td class="px-4 py-2 text-center font-semibold text-yellow-600 border">B+</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-600 border">IF407</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border">Pemrograman Web</td>
                        <td class="px-4 py-2 text-center text-gray-700 border">3</td>
                        <td class="px-4 py-2 text-center font-semibold text-green-600 border">A</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-600 border">IF509</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border">Kecerdasan Buatan</td>
                        <td class="px-4 py-2 text-center text-gray-700 border">3</td>
                        <td class="px-4 py-2 text-center font-semibold text-yellow-600 border">B</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
@endsection