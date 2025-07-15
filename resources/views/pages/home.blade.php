@extends('layouts.layout')
@section('title', 'Beranda')

@section('content')
    {{-- Hero Section --}}
    <section class="bg-blue-600 text-white py-16 px-6 rounded-xl mb-12">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="w-full lg:w-1/2 text-center lg:text-left">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight mb-4">
                    Temukan Gadget Impianmu di Inigadget
                </h1>
                <p class="text-lg mb-6">
                    Produk terbaru dan terbaik dari brand ternama. Dapatkan promo spesial hari ini!
                </p>
                <a href="{{ route('products') }}"
                    class="inline-block bg-white text-blue-600 px-6 py-3 rounded-full font-semibold shadow hover:bg-pink-100 transition">
                    Belanja Sekarang
                </a>
            </div>
            {{-- Gambar optional jika kamu mau menambahkan ilustrasi --}}
            {{-- <div class="hidden lg:block w-full lg:w-1/2">
                <img src="/images/gadget-hero.png" alt="Gadget Hero" class="w-full h-auto">
            </div> --}}
        </div>
    </section>

    {{-- Produk Unggulan --}}
    <h2 class="text-2xl font-bold mb-4">Produk Unggulan</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse ($products as $product)
            <a href="{{ route('products.show', $product->id) }}">
                <div class="bg-white p-4 rounded-xl shadow hover:shadow-md transition">
                    <img src="{{ $product->image_url }}" class="w-full h-40 sm:h-48 object-cover rounded" alt="{{ $product->name }}">
                    <h3 class="mt-2 font-semibold text-base md:text-lg">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $product->brand->name }} - {{ $product->osType->name }}</p>
                    <p class="text-blue-600 font-bold mt-1 text-sm md:text-base">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </p>
                </div>
            </a>
        @empty
            <p class="text-gray-600 col-span-full text-center">Tidak ada produk tersedia.</p>
        @endforelse
    </div>

    {{-- Tombol Lihat Semua Produk --}}
    <div class="mt-10 text-center">
        <a href="{{ route('products') }}"
            class="inline-block bg-blue-600 text-white px-6 py-3 rounded-full font-semibold shadow hover:bg-blue-700 transition">
            Lihat Semua Produk
        </a>
    </div>
@endsection
