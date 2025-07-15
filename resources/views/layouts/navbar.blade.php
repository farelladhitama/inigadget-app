<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        {{-- Logo --}}
        <a href="{{ route('home') }}"
            class="text-2xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 text-transparent bg-clip-text hover:from-pink-500 hover:to-yellow-500 hover:scale-100 transition duration-300">
            Inigadget
        </a>

        {{-- Desktop Nav --}}
        <nav class="hidden md:flex items-center space-x-6 text-gray-700 font-medium">
            @php
                $navLinks = [
                    ['name' => 'Beranda', 'route' => 'home', 'url' => '/'],
                    ['name' => 'Produk', 'route' => 'products', 'url' => 'products'],
                    ['name' => 'Kategori', 'route' => 'categories', 'url' => 'categories'],
                    ['name' => 'Tentang', 'route' => 'about', 'url' => 'about'],
                ];
            @endphp

            @foreach ($navLinks as $link)
                <a href="{{ route($link['route']) }}"
                    class="px-3 py-2 rounded-lg transition duration-200
                        {{ request()->is($link['url']) ? 'font-bold text-blue-600 bg-blue-50' : 'hover:bg-blue-100 hover:text-blue-600' }}">
                    {{ $link['name'] }}
                </a>
            @endforeach
        </nav>

        {{-- Mobile Button --}}
        <button class="md:hidden text-gray-700 focus:outline-none" id="mobile-menu-toggle">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden px-4 pb-4 space-y-2 text-gray-700 font-medium bg-white border-t">
        @foreach ($navLinks as $link)
            <a href="{{ route($link['route']) }}"
                class="block py-2 px-3 rounded-lg transition hover:bg-blue-100 hover:text-blue-700
                    {{ request()->is($link['url']) ? 'font-bold text-blue-600 bg-blue-50' : '' }}">
                {{ $link['name'] }}
            </a>
        @endforeach

    {{-- Script Toggle --}}
    <script>
        document.getElementById('mobile-menu-toggle').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</header>
