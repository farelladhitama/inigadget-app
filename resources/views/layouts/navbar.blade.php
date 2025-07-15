<header class="bg-white shadow p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-600">Inigadget</h1>
        <nav class="space-x-4">
            <a href="{{ route('home') }}" class="hover:text-blue-600 {{ request()->is('/') ? 'font-bold' : '' }}">Beranda</a>
            <a href="{{ route('products') }}" class="hover:text-blue-600 {{ request()->is('products') ? 'font-bold' : '' }}">Produk</a>
            <a href="{{ route('categories') }}" class="hover:text-blue-600 {{ request()->is('categories') ? 'font-bold' : '' }}">Kategori</a>
            <a href="{{ route('about') }}" class="hover:text-blue-600 {{ request()->is('about') ? 'font-bold' : '' }}">Tentang</a>
        </nav>
    </div>
</header>
