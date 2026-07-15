@extends('template.customer')
@section('title', 'Detail Pesanan')
@section('content')

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <a href="{{ url('/customer/orders') }}"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 12H5m7 7l-7-7 7-7" />
                        </svg>
                    </a>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Detail Pesanan</h1>
                </div>
                <p class="text-gray-500 ml-8">
                    #{{ $transaksi->order_id }}
                </p>
            </div>
            <span
                class="inline-flex items-center gap-1.5 text-sm font-medium px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400">
                <span class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></span>
                Diproses
            </span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Timeline --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Status Pesanan</h3>
                    <div class="relative">
                        <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gray-200 dark:bg-gray-700"></div>
                        <div class="space-y-8">
                            @php
                                $timeline = [
                                    [
                                        'status' => 'Pesanan Dibuat',
                                        'desc' => 'Pesanan berhasil dibuat',
                                        'time' => '29 Mei 2026, 14:23',
                                        'done' => true,
                                    ],
                                    [
                                        'status' => 'Pembayaran Diverifikasi',
                                        'desc' => 'Pembayaran telah dikonfirmasi',
                                        'time' => '29 Mei 2026, 15:10',
                                        'done' => true,
                                    ],
                                    [
                                        'status' => 'Pesanan Diproses',
                                        'desc' => 'Pesanan sedang diproses oleh tim kami',
                                        'time' => '30 Mei 2026, 09:00',
                                        'done' => true,
                                    ],
                                    [
                                        'status' => 'Pesanan Dikirim',
                                        'desc' => 'Pesanan dalam perjalanan ke alamat tujuan',
                                        'time' => '-',
                                        'done' => false,
                                    ],
                                    [
                                        'status' => 'Pesanan Selesai',
                                        'desc' => 'Pesanan telah diterima',
                                        'time' => '-',
                                        'done' => false,
                                    ],
                                ];
                            @endphp
                            @foreach ($timeline as $index => $item)
                                <div class="relative flex items-start gap-4">
                                    <div class="relative z-10 flex-shrink-0">
                                        @if ($item['done'])
                                            <div
                                                class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center shadow-md">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                        @elseif ($index === 3)
                                            <div
                                                class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center shadow-md animate-pulse">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        @else
                                            <div
                                                class="w-8 h-8 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0 pt-1">
                                        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $item['status'] }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ $item['desc'] }}</p>
                                        <p class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">{{ $item['time'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Produk --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="p-5 border-b border-gray-100 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Produk Dipesan</h3>
                    </div>
                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        @foreach ($transaksi->detailTransaksi as $detail)
                            <div class="p-4 flex items-center gap-4">

                                <img src="{{ asset('storage/' . $detail->produk->gambar) }}"
                                    class="w-16 h-16 rounded-lg object-cover">

                                <div class="flex-1">

                                    <p class="font-semibold">

                                        {{ $detail->produk->nama_produk }}

                                    </p>

                                    <p class="text-sm text-gray-500">

                                        {{ $detail->produk->brand }}

                                    </p>

                                    <p class="text-sm text-gray-500">

                                        Qty {{ $detail->qty }}

                                        ×

                                        Rp {{ number_format($detail->harga, 0, ',', '.') }}

                                    </p>

                                </div>

                                <div class="font-bold">

                                    Rp {{ number_format($detail->subtotal, 0, ',', '.') }}

                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                {{-- Info Pembeli --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-5">
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Data Pembeli
                    </h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-500 dark:text-gray-400">Nama</span>
                            <span class="text-gray-900 dark:text-white font-medium">{{ $transaksi->user->username }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 dark:text-gray-400">Email</span>
                            <span class="text-gray-900 dark:text-white">{{ $transaksi->user->email }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 dark:text-gray-400">Telepon</span>
                            <span class="text-gray-900 dark:text-white">{{ $transaksi->user->telepon }}</span>
                        </div>
                        <div class="pt-3 border-t border-gray-100 dark:border-gray-700">
                            <p class="text-gray-500 dark:text-gray-400 mb-1">Alamat Pengiriman</p>
                            <p class="text-gray-900 dark:text-white">{{ $transaksi->alamat_tujuan }}</p>
                        </div>
                    </div>
                </div>

                {{-- Ringkasan Pembayaran --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-5">
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Ringkasan Pembayaran
                    </h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-500 dark:text-gray-400">Subtotal</span>
                            <span class="text-gray-900 dark:text-white">Rp
                                {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
                        </div>

                        <div class="pt-3 border-t border-gray-100 dark:border-gray-700 flex justify-between">
                            <span class="font-semibold text-gray-900 dark:text-white">Total</span>
                            <span class="font-bold text-lg text-red-600 dark:text-red-400">Rp
                                {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Metode Pembayaran --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-5">
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        Metode Pembayaran
                    </h3>
                    <div class="flex items-center gap-3 p-3 rounded-lg bg-gray-50 dark:bg-gray-700/50">
                        <div
                            class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $transaksi->metode_bayar }}
                            </p>
                            <p class="text-xs text-gray-500">

                                {{ $transaksi->payment_type }}

                            </p>
                        </div>
                    </div>
                    <div
                        class="mt-3 p-3 rounded-lg bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-900/30">
                        <div class="flex items-center gap-2">
                            @if ($transaksi->payment_status == 'paid')
                                <span class="text-green-600">
                                    Pembayaran Berhasil
                                </span>
                            @elseif($transaksi->payment_status == 'pending')
                                <span class="text-yellow-600">
                                    Menunggu Pembayaran
                                </span>
                            @elseif($transaksi->payment_status == 'expire')
                                <span class="text-red-600">
                                    Pembayaran Kedaluwarsa
                                </span>
                            @else
                                <span class="text-red-600">
                                    Pembayaran Gagal
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="space-y-3">
                    <a href="#"
                        class="w-full inline-flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 transition text-white px-5 py-2.5 rounded-lg font-medium shadow-md hover:shadow-lg text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Hubungi CS
                    </a>
                    <a href="#"
                        class="w-full inline-flex items-center justify-center gap-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition text-gray-700 dark:text-gray-300 px-5 py-2.5 rounded-lg font-medium text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Unduh Invoice
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
