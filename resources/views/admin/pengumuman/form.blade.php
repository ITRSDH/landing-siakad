@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-2xl bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-xl shadow transition-colors duration-300">
  <h2 class="text-xl font-bold mb-4">{{ isset($pengumuman) ? 'Edit Pengumuman' : 'Tambah Pengumuman' }}</h2>

  <form action="{{ isset($pengumuman) ? route('pengumuman.update', $pengumuman->id) : route('pengumuman.store') }}" method="POST">
    @csrf
    @if(isset($pengumuman)) @method('PUT') @endif

    {{-- Judul --}}
    <label class="block mb-2">Judul</label>
    <input name="judul" class="w-full border dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-2 rounded mb-1" value="{{ old('judul', $pengumuman->judul ?? '') }}">
    @error('judul') <p class="text-red-600 dark:text-red-400 text-sm mb-2">{{ $message }}</p> @enderror

    {{-- Isi --}}
    <label class="block mb-2">Isi</label>
    <textarea id="ckeditor" name="isi" class="w-full border dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-2 rounded mb-1" rows="6">{{ old('isi', $pengumuman->isi ?? '') }}</textarea>
    @error('isi') <p class="text-red-600 dark:text-red-400 text-sm mb-2">{{ $message }}</p> @enderror

    {{-- Kategori --}}
    <label class="block mb-2">Kategori</label>
    <input name="kategori" class="w-full border dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-2 rounded mb-1" value="{{ old('kategori', $pengumuman->kategori ?? '') }}">
    @error('kategori') <p class="text-red-600 dark:text-red-400 text-sm mb-2">{{ $message }}</p> @enderror

    {{-- Tanggal --}}
    <label class="block mb-2">Tanggal</label>
    <input type="date" name="tanggal" class="w-full border dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-2 rounded mb-1" value="{{ old('tanggal', isset($pengumuman) ? $pengumuman->tanggal?->format('Y-m-d') : '') }}">
    @error('tanggal') <p class="text-red-600 dark:text-red-400 text-sm mb-2">{{ $message }}</p> @enderror

    <div class="flex justify-end mt-4">
      <a href="{{ route('pengumuman.index') }}" class="mr-3 text-gray-600 dark:text-gray-300">Batal</a>
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">Simpan</button>
    </div>
  </form>
</div>

{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('ckeditor', {
    height: 200,
  });
</script>
@endsection
