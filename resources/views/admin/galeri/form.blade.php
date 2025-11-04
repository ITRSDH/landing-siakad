@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-2xl">
  <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-100">
    {{ isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri' }}
  </h2>

  <form action="{{ isset($galeri) ? route('galeri.update', $galeri->id) : route('galeri.store') }}" 
        method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
    @csrf
    @if(isset($galeri)) @method('PUT') @endif

    <!-- Judul -->
    <label class="block mb-2 text-gray-700 dark:text-gray-200">Judul</label>
    <input name="judul" class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded mb-1 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100" 
           value="{{ old('judul', $galeri->judul ?? '') }}">
    @error('judul')
    <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
    @enderror

    <!-- Deskripsi dengan CKEditor -->
    <label class="block mb-2 text-gray-700 dark:text-gray-200">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded mb-1 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100">{{ old('deskripsi', $galeri->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
    <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
    @enderror

    <!-- Kategori -->
    <label class="block mb-2 text-gray-700 dark:text-gray-200">Kategori</label>
    <input name="kategori" class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded mb-1 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100" 
           value="{{ old('kategori', $galeri->kategori ?? '') }}">
    @error('kategori')
    <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
    @enderror

    <!-- Tanggal -->
    <label class="block mb-2 text-gray-700 dark:text-gray-200">Tanggal</label>
    <input type="date" name="tanggal" class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded mb-1 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100" 
           value="{{ old('tanggal', isset($galeri) ? $galeri->tanggal?->format('Y-m-d') : '') }}">
    @error('tanggal')
    <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
    @enderror

    {{-- Gambar --}}
    <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-200">Gambar (Hanya Image)</label>
    <input type="file" name="gambar[]" accept="image/*" multiple 
           class="w-full border p-2 rounded mb-1 dark:bg-gray-700 dark:text-white">
    @error('gambar.*')
    <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
    @enderror

    <!-- Preview gambar lama -->
    @if(isset($galeri) && is_array($galeri->gambar) && count($galeri->gambar))
    <div class="grid grid-cols-3 gap-2 mb-4">
        @foreach($galeri->gambar as $img)
        <div class="relative group">
            <img src="{{ asset( $img) }}" class="w-full h-24 object-cover rounded border border-red-300 dark:border-red-600">
            <span class="absolute top-1 right-1 text-white bg-red-600 rounded-full px-2 text-xs cursor-pointer opacity-0 group-hover:opacity-100 transition" onclick="confirm('Hapus gambar?')">×</span>
        </div>
        @endforeach
    </div>
    @endif

    <!-- Tombol -->
    <div class="flex justify-end mt-4">
      <a href="{{ route('galeri.index') }}" class="mr-3 text-gray-700 dark:text-gray-200 hover:text-red-600">Batal</a>
      <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Simpan</button>
    </div>
  </form>
</div>

<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'), {
            toolbar: ['heading','|','bold','italic','link','bulletedList','numberedList','blockQuote','undo','redo'],
        })
        .catch(error => { console.error(error); });
</script>
@endsection
