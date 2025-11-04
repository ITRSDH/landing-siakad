@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">
        {{ $ormawa->exists ? 'Edit Organisasi' : 'Tambah Organisasi' }}
    </h1>

    <form 
        action="{{ $ormawa->exists ? route('ormawa.update', $ormawa) : route('ormawa.store') }}" 
        method="POST" 
        enctype="multipart/form-data" 
        class="space-y-4 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 transition-colors duration-300"
    >
        @csrf
        @if($ormawa->exists)
            @method('PUT')
        @endif

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Organisasi</label>
            <input type="text" name="nama" 
                value="{{ old('nama', $ormawa->nama) }}" 
                class="border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 
                       text-gray-900 dark:text-gray-100 rounded-lg p-2 w-full focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
            <select name="kategori" 
                class="border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 
                       text-gray-900 dark:text-gray-100 rounded-lg p-2 w-full focus:ring-blue-500 focus:border-blue-500"
                required>
                <option value="">-- Pilih Kategori --</option>
                <option value="akademik" @selected(old('kategori', $ormawa->kategori) == 'akademik')>Akademik</option>
                <option value="seni" @selected(old('kategori', $ormawa->kategori) == 'seni')>Seni</option>
                <option value="olahraga" @selected(old('kategori', $ormawa->kategori) == 'olahraga')>Olahraga</option>
                <option value="sosial" @selected(old('kategori', $ormawa->kategori) == 'sosial')>Sosial</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                class="border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 
                       text-gray-900 dark:text-gray-100 rounded-lg p-2 w-full focus:ring-blue-500 focus:border-blue-500">{{ old('deskripsi', $ormawa->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah Anggota</label>
            <input type="number" name="jumlah_anggota" 
                value="{{ old('jumlah_anggota', $ormawa->jumlah_anggota) }}" 
                class="border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 
                       text-gray-900 dark:text-gray-100 rounded-lg p-2 w-full focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar / Logo</label>
            <input type="file" name="gambar" 
                class="border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 
                       text-gray-900 dark:text-gray-100 rounded-lg p-2 w-full">
            @if($ormawa->gambar)
                <img src="{{ asset($ormawa->gambar) }}" 
                     class="w-24 h-24 mt-2 rounded object-cover border dark:border-gray-600">
            @endif
        </div>

        <div class="pt-4">
            <button 
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-300">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
