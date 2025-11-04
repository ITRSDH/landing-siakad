@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
  <h2 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-gray-100">
    {{ isset($prestasi) && $prestasi->exists ? 'Edit Prestasi' : 'Tambah Prestasi' }}
  </h2>

  <form 
    action="{{ $prestasi->exists ? route('prestasi.update', $prestasi) : route('prestasi.store') }}"
    method="POST" enctype="multipart/form-data"
    class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow max-w-2xl"
  >
      @csrf
      @if($prestasi->exists)
          @method('PUT')
      @endif

      <div class="mb-4">
        <label class="block font-medium text-gray-700 dark:text-gray-300">Nama Mahasiswa</label>
        <input type="text" name="nama_mahasiswa" class="border p-2 w-full rounded bg-gray-50 dark:bg-gray-700 dark:text-gray-100"
               value="{{ old('nama_mahasiswa', $prestasi->nama_mahasiswa ?? '') }}" required>
      </div>

      <div class="mb-4">
        <label class="block font-medium text-gray-700 dark:text-gray-300">Program Studi</label>
        <input type="text" name="program_studi" class="border p-2 w-full rounded bg-gray-50 dark:bg-gray-700 dark:text-gray-100"
               value="{{ old('program_studi', $prestasi->program_studi ?? '') }}">
      </div>

      <div class="mb-4">
        <label class="block font-medium text-gray-700 dark:text-gray-300">Judul Prestasi</label>
        <input type="text" name="judul_prestasi" class="border p-2 w-full rounded bg-gray-50 dark:bg-gray-700 dark:text-gray-100"
               value="{{ old('judul_prestasi', $prestasi->judul_prestasi ?? '') }}" required>
      </div>

      <div class="mb-4">
        <label class="block font-medium text-gray-700 dark:text-gray-300">Tingkat</label>
        <select name="tingkat" class="border p-2 w-full rounded bg-gray-50 dark:bg-gray-700 dark:text-gray-100" required>
          <option value="">-- Pilih Tingkat --</option>
          @foreach(['kampus','nasional','internasional'] as $t)
            <option value="{{ $t }}" {{ old('tingkat', $prestasi->tingkat ?? '') == $t ? 'selected' : '' }}>
              {{ ucfirst($t) }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-4">
        <label class="block font-medium text-gray-700 dark:text-gray-300">Tahun</label>
        <input type="number" name="tahun" class="border p-2 w-full rounded bg-gray-50 dark:bg-gray-700 dark:text-gray-100"
               value="{{ old('tahun', $prestasi->tahun ?? date('Y')) }}" required>
      </div>

      <div class="mb-4">
        <label class="block font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
        <textarea name="deskripsi" class="border p-2 w-full rounded bg-gray-50 dark:bg-gray-700 dark:text-gray-100" rows="4">{{ old('deskripsi', $prestasi->deskripsi ?? '') }}</textarea>
      </div>

      <div class="mb-4">
        <label class="block font-medium text-gray-700 dark:text-gray-300">Gambar (opsional)</label>
        <input type="file" name="gambar" class="border p-2 w-full rounded bg-gray-50 dark:bg-gray-700 dark:text-gray-100">
        @if(isset($prestasi) && $prestasi->gambar)
          <img src="{{ asset($prestasi->gambar) }}" alt="gambar" class="w-32 mt-2 rounded">
        @endif
      </div>

      <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
        Simpan
      </button>
  </form>
</div>
@endsection
