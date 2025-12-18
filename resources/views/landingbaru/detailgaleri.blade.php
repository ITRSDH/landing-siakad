@extends("landingbaru.layout.appbranda")

@section('content')
<section class="relative bg-cover bg-center text-white py-20 md:py-28" style="background-image: url('https://picsum.photos/1600/500?random=21');">
    <div class="absolute inset-0 bg-blue-900/70"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">{{ $galeri->judul ?? $galeri->title ?? 'Galeri' }}</h1>
        
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('galeri.index') }}" class="hover:underline hover:text-white transition">Galeri</a>
            <span>/</span>
            <span>Detail</span>
        </nav>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-5xl">
        <div class="bg-white rounded-2xl shadow p-8">
            <div class="flex flex-wrap items-center gap-3 text-sm mb-6">
                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold">
                    {{ $galeri->kategori ?? $galeri->category ?? 'Umum' }}
                </span>
                <span class="text-gray-500">
                    @if(isset($galeri->tanggal))
                        {{ \Carbon\Carbon::parse($galeri->tanggal)->format('d M Y') }}
                    @elseif(isset($galeri->date))
                        {{ \Carbon\Carbon::parse($galeri->date)->format('d M Y') }}
                    @elseif(isset($galeri->created_at))
                        {{ \Carbon\Carbon::parse($galeri->created_at)->format('d M Y') }}
                    @else
                        {{ date('d M Y') }}
                    @endif
                </span>
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold">Aktif</span>
                <span class="text-gray-500">
                    @php
                        $imageCount = 0;
                        if (isset($galeri->gambar)) {
                            $imageCount = is_array($galeri->gambar) ? count($galeri->gambar) : 1;
                        } elseif (isset($galeri->images)) {
                            $imageCount = is_array($galeri->images) ? count($galeri->images) : 1;
                        }
                    @endphp
                    {{ $imageCount }} Foto
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @php
                    $images = [];
                    if (isset($galeri->gambar)) {
                        $images = is_array($galeri->gambar) ? $galeri->gambar : [$galeri->gambar];
                    } elseif (isset($galeri->images)) {
                        $images = is_array($galeri->images) ? $galeri->images : [$galeri->images];
                    }
                @endphp
                
                @if(count($images) > 0)
                    @foreach($images as $index => $img)
                    <div>
                        <img src="{{ $img ? config('app.api_storage') . $img : 'https://picsum.photos/600/338?random=' . $index }}" alt="Foto {{ $index + 1 }}" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    @endforeach
                @else
                    <p class="col-span-3 text-center text-gray-500">Belum ada foto.</p>
                @endif
            </div>

            <div class="mt-6 text-gray-700 prose max-w-full">
                <p>{!! $galeri->deskripsi ?? $galeri->description ?? 'Deskripsi tidak tersedia' !!}</p>
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('landing.galeri.index') }}" class="inline-block bg-yellow-400 text-[#003366] font-semibold px-8 py-3 rounded-full shadow hover:bg-yellow-500 hover:scale-105 transform transition">
                    Kembali ke Galeri
                </a>
            </div>
        </div>
    </div>
</section>
@endsection