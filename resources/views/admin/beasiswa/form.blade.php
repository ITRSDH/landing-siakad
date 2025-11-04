@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">
        {{ $beasiswa->exists ? 'Edit Beasiswa' : 'Tambah Beasiswa' }}
    </h1>

    <form 
        action="{{ $beasiswa->exists ? route('beasiswa.update', $beasiswa) : route('beasiswa.store') }}" 
        method="POST" 
        enctype="multipart/form-data" 
        class="space-y-4 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md transition-colors duration-300"
    >
        @csrf
        @if($beasiswa->exists)
            @method('PUT')
        @endif

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Beasiswa</label>
            <input 
                type="text" 
                name="nama" 
                value="{{ old('nama', $beasiswa->nama) }}" 
                class="border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg p-2 w-full focus:ring-blue-500 focus:border-blue-500"
                required
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
            <select 
                name="kategori" 
                class="border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg p-2 w-full focus:ring-blue-500 focus:border-blue-500" 
                required
            >
                <option value="">-- Pilih Kategori --</option>
                <option value="prestasi" @selected(old('kategori', $beasiswa->kategori) == 'prestasi')>Prestasi</option>
                <option value="bidikmisi" @selected(old('kategori', $beasiswa->kategori) == 'bidikmisi')>Bidikmisi / KIP</option>
                <option value="swasta" @selected(old('kategori', $beasiswa->kategori) == 'swasta')>Swasta</option>
                <option value="internasional" @selected(old('kategori', $beasiswa->kategori) == 'internasional')>Internasional</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
            <textarea 
                name="deskripsi" 
                rows="4" 
                class="border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg p-2 w-full focus:ring-blue-500 focus:border-blue-500"
            >{{ old('deskripsi', $beasiswa->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deadline</label>
            <input 
                type="date" 
                name="deadline" 
                value="{{ old('deadline', $beasiswa->deadline) }}" 
                class="border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg p-2 w-full focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kuota</label>
            <input 
                type="text" 
                name="kuota" 
                value="{{ old('kuota', $beasiswa->kuota) }}" 
                class="border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg p-2 w-full focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar / Banner</label>
            <input 
                type="file" 
                name="gambar" 
                class="border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg p-2 w-full"
            >
            @if($beasiswa->gambar)
                <img 
                    src="{{ asset($beasiswa->gambar) }}" 
                    class="w-24 h-24 mt-2 rounded object-cover border dark:border-gray-600"
                >
            @endif
        </div>

        <div class="pt-4">
            <button 
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors duration-300"
            >
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
