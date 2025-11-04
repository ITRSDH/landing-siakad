@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-4xl py-10 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-8 text-gray-900 dark:text-gray-100 text-center">
        ✏️ Edit Profil Kampus
    </h1>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 dark:bg-green-800 dark:text-green-100 dark:border-green-700 px-4 py-3 rounded mb-6 text-center shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profilkampus.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8 bg-white dark:bg-gray-900 p-6 rounded-xl shadow-md transition">
        @csrf

        {{-- Judul --}}
        <div>
            <label class="block font-semibold mb-2 text-gray-800 dark:text-gray-200">Judul</label>
            <input type="text" name="judul"
                value="{{ old('judul', $profil->judul ?? '') }}"
                class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block font-semibold mb-2 text-gray-800 dark:text-gray-200">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"
                class="ckeditor w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 rounded-lg px-3 py-2">{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
        </div>

        {{-- Visi --}}
        <div>
            <label class="block font-semibold mb-2 text-gray-800 dark:text-gray-200">Visi</label>
            <textarea id="visi" name="visi" rows="3"
                class="ckeditor w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 rounded-lg px-3 py-2">{{ old('visi', $profil->visi ?? '') }}</textarea>
        </div>

        {{-- Misi --}}
        <div>
            <label class="block font-semibold mb-2 text-gray-800 dark:text-gray-200">Misi</label>
            <textarea id="misi" name="misi" rows="3"
                class="ckeditor w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 rounded-lg px-3 py-2">{{ old('misi', $profil->misi ?? '') }}</textarea>
        </div>

        {{-- Fasilitas Dinamis --}}
        <div x-data="fasilitasForm()" class="space-y-4">
            <label class="block font-semibold text-gray-800 dark:text-gray-200">Fasilitas</label>

            <button type="button" @click="addFasilitas"
                class="mb-4 inline-flex items-center gap-1 px-3 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 dark:hover:bg-green-500 transition">
                ➕ Tambah Fasilitas
            </button>

            <template x-for="(item, index) in fasilitas" :key="index">
                <div class="p-4 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 space-y-3 relative shadow-sm">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800 dark:text-gray-100">
                            Fasilitas <span x-text="index + 1"></span>
                        </h3>
                        <button type="button" @click="removeFasilitas(index)"
                            class="text-sm text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition">
                            🗑 Hapus
                        </button>
                    </div>

                    <div>
                        <label class="block text-sm mb-1 text-gray-700 dark:text-gray-300">Nama</label>
                        <input type="text" :name="'fasilitas['+index+'][nama]'" x-model="item.nama"
                            class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                            placeholder="Contoh: Laboratorium Komputer">
                    </div>

                    <div>
                        <label class="block text-sm mb-1 text-gray-700 dark:text-gray-300">Deskripsi</label>
                        <textarea :name="'fasilitas['+index+'][deskripsi]'" x-model="item.deskripsi" rows="2"
                            class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                            placeholder="Contoh: Dilengkapi dengan komputer modern dan koneksi internet cepat"></textarea>
                    </div>
                </div>
            </template>
        </div>

        {{-- Struktur Organisasi --}}
        <div>
            <label class="block font-semibold mb-2 text-gray-800 dark:text-gray-200">Struktur Organisasi (Gambar)</label>
            @if(!empty($profil->struktur_image))
                <div class="mb-3">
                    <img src="{{ asset('struktur/' . $profil->struktur_image) }}" alt="Struktur Organisasi"
                        class="w-full md:w-2/3 lg:w-1/2 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">
                </div>
            @endif
            <input type="file" name="struktur_image"
                class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
        </div>

        {{-- Tombol Submit --}}
        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-600 text-white font-medium px-6 py-2 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-500 transition">
                💾 Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
{{-- Alpine.js --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

{{-- CKEditor 5 --}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {
    ['deskripsi', 'visi', 'misi'].forEach(id => {
        ClassicEditor
            .create(document.querySelector('#' + id), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                    '|', 'blockQuote', 'insertTable', 'undo', 'redo'
                ],
            })
            .then(editor => {
                // Tema gelap dukungan
                if (document.documentElement.classList.contains('dark')) {
                    editor.ui.view.editable.element.style.backgroundColor = '#1f2937';
                    editor.ui.view.editable.element.style.color = '#e5e7eb';
                }
            })
            .catch(error => console.error(error));
    });
});

function fasilitasForm() {
    return {
        fasilitas: @json(json_decode($profil->fasilitas ?? '[]', true) ?? []),
        addFasilitas() {
            this.fasilitas.push({ nama: '', deskripsi: '' });
        },
        removeFasilitas(index) {
            this.fasilitas.splice(index, 1);
        }
    };
}
</script>
@endpush
