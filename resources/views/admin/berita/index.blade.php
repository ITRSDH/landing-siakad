@extends('layouts.app')

@section('content')
<div x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
     x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
     :class="{ 'dark': darkMode }"
     class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">

  <!-- Header -->
  <div class="container mx-auto p-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Berita & Kegiatan</h1>

    <div class="flex items-center gap-3">
      <a href="{{ route('berita.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Tambah Berita</a>
    </div>
  </div>

  <!-- Grid Berita -->
  <div class="container mx-auto p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($beritas as $b)
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow overflow-hidden transition">
      @if($b->gambar)
      <img src="{{ asset( $b->gambar) }}" class="w-full h-40 object-cover" alt="{{ $b->judul }}">
      @else
      <div class="w-full h-40 bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-gray-400">No Image</div>
      @endif
      <div class="p-4">
        <div class="text-xs text-gray-500 dark:text-gray-400 mb-2">{{ optional($b->tanggal)->format('d M Y') }} • {{ $b->kategori }}</div>
        <h3 class="font-semibold text-gray-800 dark:text-gray-100">{{ $b->judul }}</h3>
        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2 line-clamp-3">{{ Str::limit($b->isi, 150) }}</p>
        <div class="mt-3 flex justify-between items-center">
          <a href="{{ route('berita.edit', $b->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">Edit</a>
          <form action="{{ route('berita.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Hapus berita?')">
            @csrf @method('DELETE')
            <button class="text-red-600 dark:text-red-400 hover:underline">Hapus</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="container mx-auto p-6">
    {{ $beritas->links() }}
  </div>
</div>
@endsection
