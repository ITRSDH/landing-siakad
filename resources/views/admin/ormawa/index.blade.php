@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6  ">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Daftar Organisasi Mahasiswa</h1>
        <a href="{{ route('ormawa.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Tambah Organisasi
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-100 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">
        <table class="min-w-full text-sm text-gray-800 dark:text-gray-100">
            <thead class="bg-gray-100 dark:bg-gray-700 text-left">
                <tr>
                    <th class="p-3 border dark:border-gray-600">#</th>
                    <th class="p-3 border dark:border-gray-600">Nama</th>
                    <th class="p-3 border dark:border-gray-600">Kategori</th>
                    <th class="p-3 border dark:border-gray-600">Jumlah Anggota</th>
                    <th class="p-3 border dark:border-gray-600">Gambar</th>
                    <th class="p-3 border dark:border-gray-600 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ormawas as $ormawa)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        <td class="p-3 border dark:border-gray-600">{{ $loop->iteration }}</td>
                        <td class="p-3 border dark:border-gray-600">{{ $ormawa->nama }}</td>
                        <td class="p-3 border dark:border-gray-600 capitalize">{{ $ormawa->kategori }}</td>
                        <td class="p-3 border dark:border-gray-600">{{ $ormawa->jumlah_anggota ?? '-' }}</td>
                        <td class="p-3 border dark:border-gray-600">
                            @if($ormawa->gambar)
                                <img src="{{ asset($ormawa->gambar) }}" 
                                     class="w-12 h-12 object-cover rounded border dark:border-gray-500" alt="">
                            @else
                                <span class="text-gray-400 dark:text-gray-500">Tidak ada</span>
                            @endif
                        </td>
                        <td class="p-3 border dark:border-gray-600 text-center space-x-2">
                            <a href="{{ route('ormawa.edit', $ormawa) }}" 
                               class="text-blue-600 dark:text-blue-400 hover:underline">Edit</a>
                            <form action="{{ route('ormawa.destroy', $ormawa) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    onclick="return confirm('Yakin ingin menghapus organisasi ini?')" 
                                    class="text-red-600 dark:text-red-400 hover:underline">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center text-gray-500 dark:text-gray-400">
                            Belum ada data organisasi mahasiswa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $ormawas->links() }}
    </div>
</div>
@endsection
