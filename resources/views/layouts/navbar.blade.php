<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        {{-- Logo --}}
        <a href="{{ route('home') }}"
           class="text-2xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 text-transparent bg-clip-text hover:from-pink-500 hover:to-yellow-500 transition duration-300">
            Inigadget
        </a>

        {{-- Desktop Navigation --}}
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

            {{-- Auth Area --}}
            @if (session('customer'))
                <div class="relative ml-4">
                    <button id="userDropdownButton" class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-blue-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5.121 17.804A4.992 4.992 0 0112 15a4.992 4.992 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-sm font-semibold text-gray-700">{{ session('customer')->name }}</span>
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.5 7l4.5 4.5L14.5 7H5.5z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div id="userDropdownMenu" class="hidden absolute right-0 mt-2 w-40 bg-white border rounded shadow-md z-50">
                        <form action="{{ route('customer.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('customer.login') }}"
                   class="ml-6 px-4 py-2 text-sm font-semibold text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white transition">
                    Login
                </a>
                <a href="{{ route('customer.register') }}"
                   class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                    Register
                </a>
            @endif
        </nav>

        {{-- Mobile Button --}}
        <button class="md:hidden text-gray-700 focus:outline-none" id="mobile-menu-toggle">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden px-4 pb-4 space-y-2 text-gray-700 bg-white border-t">
        @foreach ($navLinks as $link)
            <a href="{{ route($link['route']) }}"
               class="block py-2 px-3 rounded-lg transition hover:bg-blue-100 hover:text-blue-700
               {{ request()->is($link['url']) ? 'font-bold text-blue-600 bg-blue-50' : '' }}">
                {{ $link['name'] }}
            </a>
        @endforeach

        @if (session('customer'))
            <div class="text-center mt-4">
                <span class="block text-sm font-semibold text-gray-700">{{ session('customer')->name }}</span>
                <form action="{{ route('customer.logout') }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="block w-full px-4 py-2 text-red-600 hover:bg-red-100 rounded">
                        Logout
                    </button>
                </form>
            </div>
        @else
            <a href="{{ route('customer.login') }}"
               class="block w-full text-center px-4 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-600 hover:text-white transition">
                Login
            </a>
            <a href="{{ route('customer.register') }}"
               class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Register
            </a>
        @endif
    </div>

    {{-- Scripts --}}
    <script>
        document.getElementById('mobile-menu-toggle').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Dropdown logic
        const dropdownBtn = document.getElementById('userDropdownButton');
        const dropdownMenu = document.getElementById('userDropdownMenu');

        if (dropdownBtn && dropdownMenu) {
            dropdownBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                dropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function () {
                dropdownMenu.classList.add('hidden');
            });
        }
    </script>
</header>
