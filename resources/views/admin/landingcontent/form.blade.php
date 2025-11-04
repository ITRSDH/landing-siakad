@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-3xl
            bg-white dark:bg-gray-900
            text-gray-900 dark:text-gray-100
            rounded-lg shadow
            transition-colors duration-300">

  <h2 class="text-xl font-bold mb-4">Setup Konten Landing</h2>

  @if(session('success'))
  <div class="text-green-600 dark:text-green-400 mb-4">{{ session('success') }}</div>
  @endif

  <form action="{{ route('landingcontent.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Hero Section -->
    <label class="block mb-2">Hero Title</label>
    <input name="hero_title"
      class="w-full border border-gray-300 dark:border-gray-700 p-2 mb-4 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100"
      value="{{ old('hero_title', $content->hero_title ?? '') }}">

    <label class="block mb-2">Hero Subtitle</label>
    <textarea name="hero_subtitle" class="w-full border border-gray-300 dark:border-gray-700 p-2 mb-4 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">{{ old('hero_subtitle', $content->hero_subtitle ?? '') }}</textarea>

    <label>Hero Background (file)</label>
    <input type="file" name="hero_background" class="w-full mb-4">
    @if(isset($content) && $content->hero_background)
    <img src="{{ asset( $content->hero_background) }}" class="w-full h-40 object-cover rounded mb-4">
    @endif

    <!-- Statistik -->
    <div class="grid grid-cols-2 gap-4 mb-4">
      @foreach(['jumlah_program_studi','jumlah_mahasiswa','jumlah_dosen','jumlah_mitra'] as $field)
      <div>
        <label>{{ ucwords(str_replace('_',' ',$field)) }}</label>
        <input type="number" name="{{ $field }}"
          value="{{ old($field, $content->{$field} ?? 0) }}"
          class="w-full border border-gray-300 dark:border-gray-700 p-2 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
      </div>
      @endforeach
    </div>

    <!-- Keunggulan Dinamis -->
    <label class="block mb-2">Keunggulan</label>
    <div id="keunggulan-wrapper" class="space-y-4 mb-4">
      @php
      $oldKeunggulan = old('keunggulan', null);
      if (is_array($oldKeunggulan)) {
          $keunggulanItems = $oldKeunggulan;
      } elseif (is_string($content->keunggulan ?? null)) {
          $keunggulanItems = json_decode($content->keunggulan, true) ?? [];
      } else {
          $keunggulanItems = [];
      }
      @endphp

      @foreach($keunggulanItems ?? [] as $index => $item)
      <div class="keunggulan-item border border-gray-300 dark:border-gray-700 p-4 rounded relative bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
        <button type="button" class="absolute top-2 right-2 text-red-500 remove-item">&times;</button>
        <label>Icon File</label>
        <input type="file" name="keunggulan[{{ $index }}][icon]" class="mb-2">
        <label>Judul</label>
        <input type="text" name="keunggulan[{{ $index }}][title]" class="w-full border border-gray-300 dark:border-gray-700 p-2 mb-2 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" value="{{ $item['title'] ?? '' }}">
        <label>Deskripsi</label>
        <textarea name="keunggulan[{{ $index }}][description]" class="w-full border border-gray-300 dark:border-gray-700 p-2 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">{{ $item['description'] ?? '' }}</textarea>
      </div>
      @endforeach
    </div>
    <button type="button" id="add-keunggulan" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded mb-4">+ Tambah Keunggulan</button>

    <!-- Logo -->
    <label>Logo (file)</label>
    <input type="file" name="logo" class="w-full mb-4">
    @if(isset($content) && $content->logo)
    <img src="{{ asset( $content->logo) }}" class="w-24 h-24 object-contain mb-4">
    @endif

    <!-- Nama Aplikasi -->
    <label>Nama Aplikasi</label>
    <input type="text" name="nama_aplikasi" class="w-full border border-gray-300 dark:border-gray-700 p-2 mb-4 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" value="{{ old('nama_aplikasi', $content->nama_aplikasi ?? '') }}">

    <!-- Footer -->
    <label>Deskripsi Footer</label>
    <textarea name="deskripsi_footer" class="w-full border border-gray-300 dark:border-gray-700 p-2 mb-4 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">{{ old('deskripsi_footer', $content->deskripsi_footer ?? '') }}</textarea>

    <!-- Sosial Media & Kontak -->
    @foreach(['facebook','twitter','instagram','linkedin','youtube','alamat','telepon','email'] as $field)
    <label>{{ ucwords(str_replace('_',' ',$field)) }}</label>
    <input type="{{ $field=='email'?'email':'text' }}" name="{{ $field }}" class="w-full border border-gray-300 dark:border-gray-700 p-2 mb-4 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" value="{{ old($field, $content->{$field} ?? '') }}">
    @endforeach

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
  </form>
</div>

<script>
  // Keunggulan Dinamis
  let wrapper = document.getElementById('keunggulan-wrapper');
  let addBtn = document.getElementById('add-keunggulan');
  let index = {{ count($keunggulanItems ?? []) }};

  addBtn.addEventListener('click', () => {
    let div = document.createElement('div');
    div.classList.add('keunggulan-item', 'border', 'border-gray-300', 'dark:border-gray-700', 'p-4', 'rounded', 'relative', 'bg-white', 'dark:bg-gray-800', 'text-gray-900', 'dark:text-gray-100');
    div.innerHTML = `
      <button type="button" class="absolute top-2 right-2 text-red-500 remove-item">&times;</button>
      <label>Icon File</label>
      <input type="file" name="keunggulan[${index}][icon]" class="mb-2">
      <label>Judul</label>
      <input type="text" name="keunggulan[${index}][title]" class="w-full border border-gray-300 dark:border-gray-700 p-2 mb-2 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
      <label>Deskripsi</label>
      <textarea name="keunggulan[${index}][description]" class="w-full border border-gray-300 dark:border-gray-700 p-2 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"></textarea>
    `;
    wrapper.appendChild(div);
    index++;

    div.querySelector('.remove-item').addEventListener('click', () => div.remove());
  });

  document.querySelectorAll('.remove-item').forEach(btn => {
    btn.addEventListener('click', e => e.target.closest('.keunggulan-item').remove());
  });
</script>
@endsection
