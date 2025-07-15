@extends('layouts.layout')
@section('title', $product->name)

@section('content')
<div class="max-w-5xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
    <div class="flex flex-col md:flex-row gap-8">
        {{-- Gambar Produk --}}
        <div class="md:w-1/2">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-auto rounded shadow">
        </div>

        {{-- Detail Produk --}}
        <div class="md:w-1/2">
            <h1 class="text-3xl font-bold mb-3">{{ $product->name }}</h1>
            <p class="text-gray-600 mb-2">Brand: <strong>{{ $product->brand->name }}</strong></p>
            <p class="text-gray-600 mb-2">OS Type: <strong>{{ $product->osType->name }}</strong></p>
            <p class="text-gray-600 mb-2">Stok Tersedia: <strong>{{ $product->stock }}</strong> unit</p>
            <p class="text-blue-600 text-2xl font-bold mb-4">
                Rp{{ number_format($product->price, 0, ',', '.') }}
            </p>
            
            <div class="mb-4">
                <h2 class="text-lg font-semibold">Deskripsi:</h2>
                <p class="text-gray-700 mt-1">{{ $product->description }}</p>
            </div>

            <p class="text-sm text-gray-400">Dibuat pada: {{ $product->created_at->format('d M Y, H:i') }}</p>
            <p class="text-sm text-gray-400">Diperbarui: {{ $product->updated_at->format('d M Y, H:i') }}</p>

            {{-- Tombol Kembali --}}
            <a href="{{ route('products') }}"
               class="mt-6 inline-block bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition">
               ← Kembali ke Daftar Produk
            </a>
        </div>
    </div>
</div>
@endsection
