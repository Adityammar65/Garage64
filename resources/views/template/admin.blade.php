<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <div class="min-h-full">
        <nav class="bg-gradient-to-r from-gray-900 to-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img class="h-30 w-auto pt-4" src="{{ asset('images/logo.png') }}" alt="Logo">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="{{ url('/admin') }}"
                                    class="font-semibold italic rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-500">Dashboard</a>
                                <a href="{{ url('/admin/produk') }}"
                                    class="font-semibold italic rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-500">Produk</a>
                                <a href="{{ url('/admin/order') }}"
                                    class="font-semibold italic rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-500">Order</a>
                                <a href="{{ url('/admin/support') }}"
                                    class="font-semibold italic rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-500">Support</a>
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
            <div class="px-4 px-8 h-screen bg-gradient-to-r from-gray-900 to-gray-800 py-6">
                @yield('content')
            </div>
        </main>
    </div>

</body>

</html>
