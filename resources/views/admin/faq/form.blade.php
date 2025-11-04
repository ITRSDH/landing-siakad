@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-2xl">
  <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-100 ">{{ isset($faq) ? 'Edit FAQ' : 'Tambah FAQ' }}</h2>

  <form action="{{ isset($faq) ? route('faq.update', $faq->id) : route('faq.store') }}" method="POST">
    @csrf
    @if(isset($faq)) @method('PUT') @endif

    <label class="block mb-2 text-gray-800 dark:text-gray-100 ">Pertanyaan</label>
    <input name="pertanyaan" class="w-full border p-2 rounded mb-4 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600" value="{{ old('pertanyaan', $faq->pertanyaan ?? '') }}">

    <label class="block mb-2 text-gray-800 dark:text-gray-100 ">Jawaban</label>
    <textarea name="jawaban" class="w-full border p-2 rounded mb-4 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600" rows="6">{{ old('jawaban', $faq->jawaban ?? '') }}</textarea>

    <div class="flex justify-end">
      <a href="{{ route('faq.index') }}" class="mr-3 text-gray-700 dark:text-gray-300">Batal</a>
      <button type="submit" class="bg-blue-600 dark:bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </div>
  </form>
</div>
@endsection
