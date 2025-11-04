@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-3xl">
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl text-gray-800 dark:text-gray-100 font-bold">FAQ</h1>
    <a href="{{ route('faq.create') }}" class="bg-blue-600 dark:bg-blue-500 text-white px-4 py-2 rounded">Tambah FAQ</a>
  </div>

  <div class="space-y-4">
    @foreach($faqs as $f)
    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow transition-colors duration-300">
      <div class="flex justify-between items-start">
        <div>
          <h3 class="font-semibold text-gray-800 dark:text-gray-100 ">{{ $f->pertanyaan }}</h3>
          <p class="text-gray-600 dark:text-gray-300 mt-2">{{ $f->jawaban }}</p>
        </div>
        <div>
          <a href="{{ route('faq.edit', $f->id) }}" class="text-blue-600 dark:text-blue-400 mr-3">Edit</a>
          <form action="{{ route('faq.destroy', $f->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus FAQ?')">
            @csrf @method('DELETE')
            <button class="text-red-600 dark:text-red-400">Hapus</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="mt-6">{{ $faqs->links() }}</div>
</div>
@endsection
