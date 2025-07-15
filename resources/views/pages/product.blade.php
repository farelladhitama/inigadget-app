{{-- resources/views/products/product.blade.php --}}
@extends('layouts.layout')

@section('content')
    <div class="container mx-auto py-6 px-4">
        <h1 class="text-3xl font-bold mb-6">Daftar Produk</h1>

        {{-- Filter --}}
        <form method="GET" action="{{ route('products') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <select name="brand" class="border rounded px-4 py-2">
                <option value="">Semua Merek</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>

            <select name="os_type" class="border rounded px-4 py-2">
                <option value="">Semua OS</option>
                @foreach ($osTypes as $os)
                    <option value="{{ $os->id }}" {{ request('os_type') == $os->id ? 'selected' : '' }}>
                        {{ $os->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-600 text-white rounded px-4 py-2">Filter</button>
        </form>

        {{-- Produk --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($products as $product)
                <a href="{{ route('products.show', $product->id) }}"
                    class="block bg-white shadow rounded overflow-hidden hover:shadow-lg transition">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="font-semibold text-lg">{{ $product->name }}</h2>
                        <p class="text-sm text-gray-600 mb-2">
                            Brand: {{ $product->brand->name }} | OS: {{ $product->osType->name }}
                        </p>
                        <p class="font-bold text-blue-600">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>
                </a>
            @empty
                <p class="text-center text-gray-500 col-span-3">Produk tidak ditemukan.</p>
            @endforelse

        </div>
    </div>
@endsection