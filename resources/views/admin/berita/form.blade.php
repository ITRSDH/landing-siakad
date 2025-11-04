@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-2xl transition-colors duration-300 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 rounded-lg shadow">
  <h2 class="text-xl font-bold mb-4">
    {{ isset($berita) ? 'Edit Berita' : 'Tambah Berita' }}
  </h2>

  <form action="{{ isset($berita) ? route('berita.update', $berita) : route('berita.store') }}" 
        method="POST" enctype="multipart/form-data">
    @csrf
    @isset($berita)
        @method('PUT')
    @endisset

    <label class="block mb-2 font-medium">Judul</label>
    <input name="judul" class="w-full border border-gray-300 dark:border-gray-700 p-2 rounded mb-4 bg-gray-50 dark:bg-gray-800" 
           value="{{ old('judul', $berita->judul ?? '') }}" required>

    <label class="block mb-2 font-medium">Isi</label>
    <textarea name="isi" class="w-full border border-gray-300 dark:border-gray-700 p-2 rounded mb-4 bg-gray-50 dark:bg-gray-800" 
              rows="6" required>{{ old('isi', $berita->isi ?? '') }}</textarea>

    <label class="block mb-2 font-medium">Kategori</label>
    <input name="kategori" class="w-full border border-gray-300 dark:border-gray-700 p-2 rounded mb-4 bg-gray-50 dark:bg-gray-800" 
           value="{{ old('kategori', $berita->kategori ?? '') }}">

    <label class="block mb-2 font-medium">Tanggal</label>
    <input type="date" name="tanggal" 
           class="w-full border border-gray-300 dark:border-gray-700 p-2 rounded mb-4 bg-gray-50 dark:bg-gray-800"
           value="{{ old('tanggal', isset($berita) ? $berita->tanggal?->format('Y-m-d') : '') }}">

    <label class="block mb-2 font-medium">Gambar (jpg/png)</label>
    @if(isset($berita) && $berita->gambar)
    <div class="mb-2">
      <img src="{{ asset($berita->gambar) }}" class="w-48 h-32 object-cover rounded">
    </div>
    @endif
    <input type="file" name="gambar" class="mb-4 text-sm">

    <div class="flex justify-between items-center">
      <a href="{{ route('berita.index') }}" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">Batal</a>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </div>
  </form>
</div>
@endsection
