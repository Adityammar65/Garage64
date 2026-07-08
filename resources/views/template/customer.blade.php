<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50
        flex flex-col min-h-screen">

    <!-- ERROR ALERT -->
    @if (session('error') || $errors->any())
        <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
            class="fixed top-5 right-5 z-60 max-w-sm">

            <div class="rounded-lg bg-red-600 text-white shadow-lg p-4 flex items-start gap-3">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0 mt-0.5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01M10.29 3.86l-7.5 13A1 1 0 003.67 18h16.66a1 1 0 00.87-1.5l-7.5-13a1 1 0 00-1.74 0z" />
                </svg>

                <div class="flex-1">
                    <h3 class="font-semibold">Validasi Gagal</h3>

                    @if (session('error'))
                        <p class="pt-3">{{ session('error') }}</p>
                    @endif

                    <ul class="mt-1 text-sm list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                <button @click="show = false" class="text-white hover:text-gray-200">
                    ✕
                </button>

            </div>
        </div>
    @endif

    <!-- SUCCESS ALERT -->
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
            class="fixed top-5 right-5 z-60 max-w-sm">

            <div class="rounded-lg bg-green-600 text-white shadow-lg p-4 flex items-center justify-between">

                <div>
                    <h3 class="font-semibold">Berhasil</h3>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>

                <button @click="show = false" class="ml-4">
                    ✕
                </button>

            </div>
        </div>
    @endif

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-gray-900 to-gray-800 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <a href="#" class="flex items-center gap-2">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-30 w-auto pt-4">
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ url('/') }}"
                        class="hover:text-red-500 transition text-sm font-semibold italic">Home</a>
                    <a href="{{ url('/produk') }}"
                        class="hover:text-red-500 transition text-sm font-semibold italic">Products</a>
                    <a href="{{ url('/support-center') }}"
                        class="hover:text-red-500 transition text-sm font-semibold italic">Contact</a>
                    <a href="{{ url('/profile') }}"
                        class="w-10 h-10 rounded-full bg-gray-700 hover:bg-red-600 transition flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="22"
                            height="22"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="white"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.121 17.804A9 9 0 1118.88 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Search Bar -->
    <div class="bg-gradient-to-r from-gray-800 to-gray-700 text-white py-3 sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex gap-3">
                <form method="GET" action="#" class="flex-1 flex gap-2">
                    <input type="text" name="query" placeholder="Cari..." value="{{ request('query', '') }}"
                        class="flex-1 px-4 py-1 rounded bg-gray-600 text-white text-sm placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <button type="submit" class="bg-red-500 hover:bg-red-600 transition px-3 py-1 rounded">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z"
                                    stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>
                    </button>
                </form>

                <!-- Cart Button -->
                <a href="{{ url('/keranjang') }}"
                    class="relative flex items-center px-3 py-2 bg-red-500 hover:bg-red-600 transition rounded">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <span
                        class="absolute -top-2 -right-2 bg-yellow-400 text-gray-900 text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                        {{ session('cart_count', 0) }}
                    </span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-1">
        <div>

            <!-- Page Content -->
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-linear-to-bl from-slate-900 to-red-900 text-gray-300 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">

                <!-- About Section -->
                <div>
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-auto w-50 ml-10">
                    <p class="text-sm mb-4">
                        Destinasi bagi para pecinta diecast dan kolektor otomotif untuk menemukan berbagai model
                        premium, original, dan berkualitas.
                    </p>
                    <div class="flex gap-3">
                        <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center"
                            title="Email">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-label="Gmail" role="img"
                                viewBox="0 0 512 512" width="64px" height="64px" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M158 391v-142l-82-63V361q0 30 30 30" fill="#4285f4"></path>
                                    <path d="M 154 248l102 77l102-77v-98l-102 77l-102-77" fill="#ea4335"></path>
                                    <path d="M354 391v-142l82-63V361q0 30-30 30" fill="#34a853"></path>
                                    <path d="M76 188l82 63v-98l-30-23c-27-21-52 0-52 26" fill="#c5221f"></path>
                                    <path d="M436 188l-82 63v-98l30-23c27-21 52 0 52 26" fill="#fbbc04"></path>
                                </g>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center"
                            title="Whatsapp">
                            <svg width="30px" height="30px" viewBox="0 0 48 48" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>Whatsapp-color</title>
                                    <desc>Created with Sketch.</desc>
                                    <defs> </defs>
                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd">
                                        <g id="Color-" transform="translate(-700.000000, -360.000000)"
                                            fill="#67C15E">
                                            <path
                                                d="M723.993033,360 C710.762252,360 700,370.765287 700,383.999801 C700,389.248451 701.692661,394.116025 704.570026,398.066947 L701.579605,406.983798 L710.804449,404.035539 C714.598605,406.546975 719.126434,408 724.006967,408 C737.237748,408 748,397.234315 748,384.000199 C748,370.765685 737.237748,360.000398 724.006967,360.000398 L723.993033,360.000398 L723.993033,360 Z M717.29285,372.190836 C716.827488,371.07628 716.474784,371.034071 715.769774,371.005401 C715.529728,370.991464 715.262214,370.977527 714.96564,370.977527 C714.04845,370.977527 713.089462,371.245514 712.511043,371.838033 C711.806033,372.557577 710.056843,374.23638 710.056843,377.679202 C710.056843,381.122023 712.567571,384.451756 712.905944,384.917648 C713.258648,385.382743 717.800808,392.55031 724.853297,395.471492 C730.368379,397.757149 732.00491,397.545307 733.260074,397.27732 C735.093658,396.882308 737.393002,395.527239 737.971421,393.891043 C738.54984,392.25405 738.54984,390.857171 738.380255,390.560912 C738.211068,390.264652 737.745308,390.095816 737.040298,389.742615 C736.335288,389.389811 732.90737,387.696673 732.25849,387.470894 C731.623543,387.231179 731.017259,387.315995 730.537963,387.99333 C729.860819,388.938653 729.198006,389.89831 728.661785,390.476494 C728.238619,390.928051 727.547144,390.984595 726.969123,390.744481 C726.193254,390.420348 724.021298,389.657798 721.340985,387.273388 C719.267356,385.42535 717.856938,383.125756 717.448104,382.434484 C717.038871,381.729275 717.405907,381.319529 717.729948,380.938852 C718.082653,380.501232 718.421026,380.191036 718.77373,379.781688 C719.126434,379.372738 719.323884,379.160897 719.549599,378.681068 C719.789645,378.215575 719.62006,377.735746 719.450874,377.382942 C719.281687,377.030139 717.871269,373.587317 717.29285,372.190836 Z"
                                                id="Whatsapp"> </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-bold mb-4">Navigasi</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-red-500 transition">Home</a></li>
                        <li><a href="#" class="hover:text-red-500 transition">Products</a></li>
                        <li><a href="#" class="hover:text-red-500 transition">About Us</a></li>
                        <li><a href="{{ url('/support-center') }}" class="hover:text-red-500 transition">Contact</a>
                        </li>
                        <li><a href="{{ url('/support-center') }}" class="hover:text-red-500 transition">FAQs</a>
                        </li>
                    </ul>
                </div>

                <!-- Customer Service -->
                <div>
                    <h4 class="text-white font-bold mb-4">Customer Service</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ url('/kebijakan-pengiriman') }}"
                                class="hover:text-red-500 transition">Kebijakan Pengiriman</a></li>
                        <li><a href="{{ url('/kebijakan-retur') }}" class="hover:text-red-500 transition">Kebijakan
                                Retur</a></li>
                        <li><a href="{{ url('/kebijakan-privasi') }}" class="hover:text-red-500 transition">Kebijakan
                                Privasi</a></li>
                        <li><a href="{{ url('/syarat-ketentuan') }}" class="hover:text-red-500 transition">Syarat dan
                                Ketentuan</a></li>
                        <li><a href="{{ url('/support-center') }}" class="hover:text-red-500 transition">Support
                                Center</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-white font-bold mb-4">Informasi dan Kontak</h4>

                    <div class="space-y-3 text-sm">

                        <p>
                            {{ $store['alamat_toko'] ?? '-' }}
                        </p>

                        <p>
                            {{ $store['no_telp_toko'] ?? '-' }}
                        </p>

                        <p>
                            <a href="mailto:{{ $store['email_toko'] ?? '' }}" class="hover:text-red-500 transition">
                                {{ $store['email_toko'] ?? '-' }}
                            </a>
                        </p>

                        <p>
                            Jam Operasional:<br>
                            {{ $store['jam_buka'] ?? '--:--' }}
                            -
                            {{ $store['jam_tutup'] ?? '--:--' }}
                            WIB
                        </p>

                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-white pt-8">
                <div class="text-center mb-4">
                    <p class="text-sm">© 2026 Garage64 All rights reserved. | Designed with love for collectors</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
