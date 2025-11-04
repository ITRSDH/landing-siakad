@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Galeri</h1>
    <a href="{{ route('galeri.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Tambah Foto</a>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach($galeris as $g)
    <div class="bg-white dark:bg-gray-800 rounded shadow overflow-hidden hover:shadow-lg transition">
      @php
          $images = is_array($g->gambar) ? $g->gambar : [];
          $firstImage = count($images) ? $images[0] : null;
      @endphp

      @if($firstImage)
      <img src="{{ asset( $firstImage) }}" class="w-full h-48 object-cover">
      @else
      <div class="w-full h-48 bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-gray-400 dark:text-gray-300">No Image</div>
      @endif

      <div class="p-4">
        <h3 class="font-semibold text-gray-800 dark:text-gray-100">{{ $g->judul }}</h3>
        <p class="text-sm text-gray-800 dark:text-white">{!! Str::limit($g->deskripsi, 80) !!}</p>
        <div class="mt-3 flex justify-between">
          <a href="{{ route('galeri.edit', $g->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">Edit</a>
          <form action="{{ route('galeri.destroy', $g->id) }}" method="POST" onsubmit="return confirm('Hapus galeri?')">
            @csrf @method('DELETE')
            <button class="text-red-600 dark:text-red-400 hover:underline">Hapus</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="mt-6">
    {{ $galeris->links() }}
  </div>
</div>
@endsection
