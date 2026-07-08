@extends('template.customer')
@section('title', 'Dashboard')
@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Welcome Card --}}
    <div class="bg-gradient-to-r from-red-500 to-red-700 rounded-2xl p-6 sm:p-8 mb-8 text-white shadow-lg">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold mb-2">Selamat Datang kembali, {{ Auth::user()->name ?? 'Customer' }}!</h1>
                <p class="text-red-100 text-sm sm:text-base">Kelola akun dan pantau pesanan Anda di sini.</p>
            </div>
            <a href="#" class="inline-flex items-center gap-2 bg-white text-red-600 px-5 py-2.5 rounded-lg font-semibold hover:bg-red-50 transition shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Jelajahi Produk
            </a>
        </div>
    </div>

    {{-- Statistik Pesanan --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl p-5 shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30 px-2 py-1 rounded-full">Total</span>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">12</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Total Pesanan</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-5 shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-yellow-600 dark:text-yellow-400 bg-yellow-50 dark:bg-yellow-900/30 px-2 py-1 rounded-full">Proses</span>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">3</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Diproses</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-5 shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-green-100 dark:bg-green-900/50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/30 px-2 py-1 rounded-full">Sukses</span>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">8</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Selesai</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-5 shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-red-100 dark:bg-red-900/50 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-900/30 px-2 py-1 rounded-full">Menunggu</span>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">1</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Pending</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Pesanan Terbaru --}}
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="p-5 border-b border-gray-100 dark:border-gray-700 flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Pesanan Terbaru</h2>
                <a href="{{ url('/customer/orders') }}" class="text-sm text-red-500 hover:text-red-600 transition font-medium">Lihat Semua</a>
            </div>
            <div class="divide-y divide-gray-100 dark:divide-gray-700">
                @php
                $recentOrders = [
                ['id' => '#INV-001', 'product' => 'Porsche 963 #7', 'date' => '01 Jun 2026', 'total' => 'Rp 450.000', 'status' => 'Selesai'],
                ['id' => '#INV-002', 'product' => 'Land Rover Defender 110', 'date' => '29 Mei 2026', 'total' => 'Rp 320.000', 'status' => 'Diproses'],
                ['id' => '#INV-003', 'product' => 'Toyota Tundra Black', 'date' => '27 Mei 2026', 'total' => 'Rp 275.000', 'status' => 'Pending'],
                ['id' => '#INV-004', 'product' => 'Nissan SILVIA (S15)', 'date' => '25 Mei 2026', 'total' => 'Rp 380.000', 'status' => 'Dikirim'],
                ['id' => '#INV-005', 'product' => 'MAZDA 787B No.18', 'date' => '22 Mei 2026', 'total' => 'Rp 520.000', 'status' => 'Selesai'],
                ];
                @endphp
                @foreach ($recentOrders as $order)
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $order['product'] }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $order['id'] }} • {{ $order['date'] }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $order['total'] }}</p>
                        @php
                        $badge = match($order['status']) {
                        'Selesai' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                        'Diproses' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400',
                        'Dikirim' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                        'Pending' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                        default => 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300',
                        };
                        @endphp
                        <span class="inline-block text-xs font-medium px-2 py-0.5 rounded-full {{ $badge }}">{{ $order['status'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-5">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Aksi Cepat</h2>
            <div class="space-y-3">
                <a href="#" class="flex items-center gap-4 p-3 rounded-lg bg-gray-50 dark:bg-gray-700/50 hover:bg-red-50 dark:hover:bg-red-900/20 group transition">
                    <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition">Beli Produk</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Jelajahi koleksi terbaru</p>
                    </div>
                </a>
                <a href="#" class="flex items-center gap-4 p-3 rounded-lg bg-gray-50 dark:bg-gray-700/50 hover:bg-blue-50 dark:hover:bg-blue-900/20 group transition">
                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">Pesanan Saya</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Lihat riwayat pesanan</p>
                    </div>
                </a>
                <a href="#" class="flex items-center gap-4 p-3 rounded-lg bg-gray-50 dark:bg-gray-700/50 hover:bg-green-50 dark:hover:bg-green-900/20 group transition">
                    <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition">Profil Saya</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Kelola informasi akun</p>
                    </div>
                </a>
                <a href="#" class="flex items-center gap-4 p-3 rounded-lg bg-gray-50 dark:bg-gray-700/50 hover:bg-purple-50 dark:hover:bg-purple-900/20 group transition">
                    <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition">Support Center</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Hubungi tim kami</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection