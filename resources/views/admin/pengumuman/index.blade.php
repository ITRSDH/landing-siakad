@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 transition-colors duration-300 bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-100">
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Pengumuman</h1>
    <a href="{{ route('pengumuman.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Tambah</a>
  </div>

  @if(session('success'))
  <div class="mb-4 text-green-600 dark:text-green-400">{{ session('success') }}</div>
  @endif

  <div class="rounded-xl overflow-hidden shadow border border-gray-200 dark:border-gray-700">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
      <thead class="bg-gray-100 dark:bg-gray-800">
        <tr>
          <th class="px-4 py-2 text-left">Judul</th>
          <th class="px-4 py-2 text-left">Kategori</th>
          <th class="px-4 py-2 text-left">Tanggal</th>
          <th class="px-4 py-2 text-right">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
        @foreach($pengumumen as $p)
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
          <td class="px-4 py-2">{{ $p->judul }}</td>
          <td class="px-4 py-2">{{ $p->kategori }}</td>
          <td class="px-4 py-2">{{ optional($p->tanggal)->format('d M Y') }}</td>
          <td class="px-4 py-2 text-right">
            <a href="{{ route('pengumuman.edit', $p->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline mr-2">Edit</a>
            <form action="{{ route('pengumuman.destroy', $p->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pengumuman?')">
              @csrf @method('DELETE')
              <button class="text-red-600 dark:text-red-400 hover:underline">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-4">
    {{ $pengumumen->links() }}
  </div>
</div>
@endsection
