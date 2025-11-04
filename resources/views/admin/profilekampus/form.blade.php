@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-3xl">
  <h2 class="text-xl font-bold mb-4">{{ isset($section) ? 'Edit Section' : 'Tambah Section' }}</h2>

  <form action="{{ isset($section) ? route('profilekampus.update', $section->id) : route('landingcontent.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($section)) @method('PUT') @endif

    <label class="block mb-2">Section Name <span class="text-sm text-gray-500">contoh: hero, profil, visi, misi, fasilitas, galeri</span></label>
    <input name="section_name" class="w-full border p-2 rounded mb-4" value="{{ old('section_name', $section->section_name ?? '') }}" {{ isset($section) ? 'readonly' : '' }} required>

    <label class="block mb-2">Title</label>
    <input name="title" class="w-full border p-2 rounded mb-4" value="{{ old('title', $section->title ?? '') }}">

    <label class="block mb-2">Content (HTML allowed)</label>
    <textarea name="content" class="w-full border p-2 rounded mb-4" rows="6">{{ old('content', $section->content ?? '') }}</textarea>

    <label class="block mb-2">Image (optional)</label>
    @if(isset($section) && $section->image)
      <div class="mb-2"><img src="{{ asset('storage/' . $section->image) }}" class="w-full h-40 object-cover rounded"></div>
    @endif
    <input type="file" name="image" class="mb-4">

    <label class="block mb-2">Order (angka kecil — urut tampil)</label>
    <input type="number" name="order" class="w-full border p-2 rounded mb-4" value="{{ old('order', $section->order ?? 0) }}">

    <div class="flex justify-end">
      <a href="{{ route('landingcontent.index') }}" class="mr-3">Batal</a>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </div>
  </form>
</div>
@endsection
