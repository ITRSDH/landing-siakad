@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Daftar Prestasi Mahasiswa</h2>
    <a href="{{ route('prestasi.create') }}" 
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
       + Tambah Prestasi
    </a>
  </div>

  @if(session('success'))
    <div class="bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 p-3 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
    <table class="min-w-full table-auto text-sm">
      <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
        <tr>
          <th class="p-3 text-left">Nama Mahasiswa</th>
          <th class="p-3 text-left">Judul</th>
          <th class="p-3 text-center">Tingkat</th>
          <th class="p-3 text-center">Tahun</th>
          <th class="p-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-gray-700 dark:text-gray-300">
        @foreach($prestasis as $prestasi)
          <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
            <td class="p-3">{{ $prestasi->nama_mahasiswa }}</td>
            <td class="p-3">{{ $prestasi->judul_prestasi }}</td>
            <td class="p-3 text-center capitalize">{{ $prestasi->tingkat }}</td>
            <td class="p-3 text-center">{{ $prestasi->tahun }}</td>
            <td class="p-3 text-center space-x-2">
              <a href="{{ route('prestasi.edit', $prestasi) }}" class="text-blue-500 hover:underline">Edit</a>
              <form action="{{ route('prestasi.destroy', $prestasi) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button onclick="return confirm('Hapus prestasi ini?')" class="text-red-500 hover:underline">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-4">
    {{ $prestasis->links() }}
  </div>
</div>
@endsection
