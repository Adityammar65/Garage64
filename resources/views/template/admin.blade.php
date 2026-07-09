<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gradient-to-r from-gray-900 to-gray-800">

    <!-- ERROR ALERT -->
    @if ($errors->any())
        <div x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 4000)"
            class="fixed top-5 right-5 z-50 max-w-sm">

            <div class="rounded-lg bg-red-600 text-white shadow-lg p-4 flex items-start gap-3">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 flex-shrink-0 mt-0.5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 9v2m0 4h.01M10.29 3.86l-7.5 13A1 1 0 003.67 18h16.66a1 1 0 00.87-1.5l-7.5-13a1 1 0 00-1.74 0z"/>
                </svg>

                <div class="flex-1">
                    <h3 class="font-semibold">Validasi Gagal</h3>

                    <ul class="mt-1 text-sm list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                <button @click="show = false"
                        class="text-white hover:text-gray-200">
                    ✕
                </button>

            </div>
        </div>
    @endif

    <!-- SUCCESS ALERT -->
    @if(session('success'))
        <div x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 3000)"
            class="fixed top-5 right-5 z-50 max-w-sm">

            <div class="rounded-lg bg-green-600 text-white shadow-lg p-4 flex items-center justify-between">

                <div>
                    <h3 class="font-semibold">Berhasil</h3>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>

                <button @click="show = false"
                        class="ml-4">
                    ✕
                </button>

            </div>
        </div>
    @endif

    <!-- NAVBAR -->
    <div class="min-h-full">
        <nav class="bg-gradient-to-r from-gray-900 to-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img class="h-30 w-auto pt-4" src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="{{ url('/admin') }}"
                                    class="font-semibold italic rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-500">Dashboard</a>
                                <a href="{{ url('/admin/produk') }}"
                                    class="font-semibold italic rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-500">Produk</a>
                                <a href="{{ url('/admin/pesanan') }}"
                                    class="font-semibold italic rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-500">Pesanan</a>
                                <a href="{{ url('/admin/support') }}"
                                    class="font-semibold italic rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-500">Support</a>
                                <a href="{{ url('/admin/laporan') }}"
                                    class="font-semibold italic rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-500">Laporan</a>
                                <a href="{{ url('/admin/pengaturan') }}"
                                    class="font-semibold italic rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-500">Pengaturan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header
            class="relative bg-gray-800 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
            <div class="mx-auto px-4 py-6 px-8">
                <h1 class="text-3xl font-archivo italic tracking-tight text-white">
                    @yield('page_title')
                </h1>
            </div>
        </header>
        <main>
            <div class="px-4 px-8 h-full py-6">
                @yield('content')
            </div>
        </main>
    </div>

</body>

</html>
