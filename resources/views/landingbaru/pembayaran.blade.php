@extends("landingbaru.layout.appbranda")

@section('content')
<section class="bg-gradient-to-br from-gray-50 via-white to-gray-100 p-6 ">
<div class="max-w-5xl mx-auto my-10">
    
    <!-- Info Pembayaran -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 border border-gray-200">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Informasi Pembayaran</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gradient-to-r from-green-50 to-emerald-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border">Periode</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border">Tagihan</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border">Status</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border">Tanggal Bayar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700 border">Semester Ganjil 2024/2025</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border">Rp 7.500.000</td>
                        <td class="px-4 py-2 text-sm font-semibold text-yellow-600 border">Belum Lunas</td>
                        <td class="px-4 py-2 text-sm text-gray-600 border">-</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700 border">Semester Genap 2023/2024</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border">Rp 7.500.000</td>
                        <td class="px-4 py-2 text-sm font-semibold text-green-600 border">Lunas</td>
                        <td class="px-4 py-2 text-sm text-gray-600 border">12 Februari 2024</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
@endsection