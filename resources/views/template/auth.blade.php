<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>
        @yield('title')
    </title>
</head>

<body class="bg-gray-900">
    
    <!-- ERROR ALERT -->
    @if (session('error') || $errors->any())
        <div x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 4000)"
            class="fixed top-5 right-5 z-60 max-w-sm">

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

                    @if (session('error'))
                        <p class="pt-3">{{ session('error') }}</p>
                    @endif

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
            class="fixed top-5 right-5 z-60 max-w-sm">

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
    
    @yield('content')
</body>

</html>
