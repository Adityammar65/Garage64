@extends('template.customer')

@section('title', 'Detail Pesanan')

@section('content')

    @php
        $statusConfig = [
            'diproses' => [
                'text' => 'Diproses',
                'bg' => 'bg-yellow-100',
                'color' => 'text-yellow-700',
                'dot' => 'bg-yellow-500',
            ],
            'dikirim' => [
                'text' => 'Dikirim',
                'bg' => 'bg-blue-100',
                'color' => 'text-blue-700',
                'dot' => 'bg-blue-500',
            ],
            'selesai' => [
                'text' => 'Selesai',
                'bg' => 'bg-green-100',
                'color' => 'text-green-700',
                'dot' => 'bg-green-500',
            ],
            'dibatalkan' => [
                'text' => 'Dibatalkan',
                'bg' => 'bg-red-100',
                'color' => 'text-red-700',
                'dot' => 'bg-red-500',
            ],
        ];

        $current = $statusConfig[$transaksi->status] ?? $statusConfig['diproses'];

        $step = match ($transaksi->status) {
            'diproses' => 3,
            'dikirim' => 4,
            'selesai' => 5,
            default => 1,
        };
    @endphp

    <div class="max-w-7xl mx-auto px-4 py-8">

        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-5 mb-8">

            <div>

                <div class="flex items-center gap-3">

                    <a href="{{ url()->previous() }}"
                        class="w-10 h-10 rounded-full border hover:bg-gray-100 flex items-center justify-center transition">

                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />

                        </svg>

                    </a>

                    <div>

                        <h1 class="text-3xl font-bold text-gray-900">
                            Detail Pesanan
                        </h1>

                        <p class="text-gray-500 mt-1 truncate max-w-sm">

                            {{ $transaksi->order_id }}

                        </p>

                    </div>

                </div>

            </div>

            <span
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold {{ $current['bg'] }} {{ $current['color'] }}">

                <span class="w-2 h-2 rounded-full {{ $current['dot'] }}"></span>

                {{ $current['text'] }}

            </span>

        </div>

        <div class="grid lg:grid-cols-3 gap-7">

            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white rounded-2xl shadow border border-gray-200">

                    <div class="px-6 py-5 border-b">

                        <h2 class="font-bold text-lg">

                            Status Pesanan

                        </h2>

                    </div>

                    <div class="p-6">

                        @php

                            $timeline = [
                                [
                                    'title' => 'Pesanan Dibuat',
                                    'desc' => 'Pesanan berhasil dibuat.',
                                ],

                                [
                                    'title' => 'Pembayaran Berhasil',
                                    'desc' => 'Pembayaran telah diverifikasi.',
                                ],

                                [
                                    'title' => 'Diproses',
                                    'desc' => 'Pesanan sedang diproses.',
                                ],

                                [
                                    'title' => 'Dikirim',
                                    'desc' => 'Pesanan sedang dikirim.',
                                ],

                                [
                                    'title' => 'Selesai',
                                    'desc' => 'Pesanan telah diterima.',
                                ],
                            ];

                        @endphp

                        <div class="relative">

                            <div class="absolute left-4 top-0 bottom-0 w-1 bg-gray-200 rounded-full"></div>

                            <div class="space-y-8">

                                @foreach ($timeline as $i => $item)
                                    <div class="relative flex gap-5">

                                        <div class="relative z-10">

                                            @if ($i + 1 < $step)
                                                <div
                                                    class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center">

                                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2.5" d="M5 13l4 4L19 7" />

                                                    </svg>

                                                </div>
                                            @elseif($i + 1 == $step)
                                                <div class="w-8 h-8 rounded-full bg-red-600 animate-pulse"></div>
                                            @else
                                                <div class="w-8 h-8 rounded-full bg-gray-300"></div>
                                            @endif

                                        </div>

                                        <div class="min-w-0">

                                            <h3 class="font-semibold text-gray-900">

                                                {{ $item['title'] }}

                                            </h3>

                                            <p class="text-sm text-gray-500">

                                                {{ $item['desc'] }}

                                            </p>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Produk --}}
                <div class="bg-white rounded-2xl shadow border border-gray-200">

                    <div
                        class="px-6 py-5 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3">

                        <div>

                            <h2 class="text-lg font-bold text-gray-900">
                                Produk yang Dibeli
                            </h2>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $transaksi->detailTransaksi->count() }} Produk • {{ $transaksi->total_qty }} Item
                            </p>

                        </div>

                        <span class="bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-semibold">

                            Total Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}

                        </span>

                    </div>

                    <div class="divide-y divide-gray-200">

                        @foreach ($transaksi->detailTransaksi as $detail)
                            <div class="p-6 flex flex-col md:flex-row gap-5 hover:bg-gray-50 transition">

                                <div class="flex-shrink-0">

                                    <img src="{{ asset('storage/' . $detail->produk->gambar) }}"
                                        alt="{{ $detail->produk->nama_produk }}"
                                        class="w-24 h-24 rounded-xl border object-cover">

                                </div>

                                {{-- Informasi Produk --}}
                                <div class="flex-1 min-w-0">

                                    <h3
                                        class="font-semibold text-gray-900 text-lg overflow-hidden text-ellipsis whitespace-nowrap">

                                        {{ $detail->produk->nama_produk }}

                                    </h3>

                                    <div class="mt-2 flex flex-wrap gap-2">

                                        <span
                                            class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full truncate max-w-[160px]">

                                            {{ $detail->produk->brand }}

                                        </span>

                                        @if (!empty($detail->produk->kode_produk))
                                            <span
                                                class="bg-blue-50 text-blue-600 text-xs px-3 py-1 rounded-full truncate max-w-[170px]">

                                                {{ $detail->produk->kode_produk }}

                                            </span>
                                        @endif

                                    </div>

                                    @if (!empty($detail->produk->deskripsi))
                                        <p
                                            class="mt-3 text-sm text-gray-500 overflow-hidden text-ellipsis whitespace-nowrap break-words">

                                            {{ $detail->produk->deskripsi }}

                                        </p>
                                    @endif

                                </div>

                                <div
                                    class="md:w-60 flex flex-row md:flex-col justify-between md:justify-center md:items-end gap-4">

                                    <div>

                                        <p class="text-xs text-gray-400">

                                            Harga

                                        </p>

                                        <p class="font-semibold text-gray-800">

                                            Rp {{ number_format($detail->harga, 0, ',', '.') }}

                                        </p>

                                    </div>

                                    <div>

                                        <p class="text-xs text-gray-400">

                                            Qty

                                        </p>

                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full bg-red-50 text-red-600 font-semibold">

                                            x{{ $detail->qty }}

                                        </span>

                                    </div>

                                    <div class="text-right">

                                        <p class="text-xs text-gray-400">

                                            Subtotal

                                        </p>

                                        <p class="font-bold text-xl text-red-600">

                                            Rp {{ number_format($detail->subtotal, 0, ',', '.') }}

                                        </p>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                    {{-- Footer --}}
                    <div class="border-t border-gray-200 bg-gray-50 rounded-b-2xl">

                        <div class="px-6 py-5 flex flex-col md:flex-row justify-between gap-6">

                            <div>

                                <p class="text-sm text-gray-500">

                                    Total Produk

                                </p>

                                <p class="font-semibold text-lg text-gray-900">

                                    {{ $transaksi->detailTransaksi->count() }} Produk

                                </p>

                            </div>

                            <div>

                                <p class="text-sm text-gray-500">

                                    Total Item

                                </p>

                                <p class="font-semibold text-lg text-gray-900">

                                    {{ $transaksi->total_qty }} Item

                                </p>

                            </div>

                            <div class="md:text-right">

                                <p class="text-sm text-gray-500">

                                    Total Pembayaran

                                </p>

                                <p class="font-bold text-2xl text-red-600">

                                    Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow border border-gray-200">

                    <div class="px-6 py-5 border-b border-gray-200">

                        <h2 class="font-bold text-gray-900">
                            Data Pembeli
                        </h2>

                    </div>

                    <div class="p-6 space-y-5">

                        <div>

                            <p class="text-xs uppercase tracking-wide text-gray-400">
                                Nama
                            </p>

                            <p class="font-semibold text-gray-900 truncate">
                                {{ $transaksi->user->username }}
                            </p>

                        </div>

                        <div>

                            <p class="text-xs uppercase tracking-wide text-gray-400">
                                Email
                            </p>

                            <p class="text-gray-700 break-all">
                                {{ $transaksi->user->email }}
                            </p>

                        </div>

                        <div>

                            <p class="text-xs uppercase tracking-wide text-gray-400">
                                Nomor Telepon
                            </p>

                            <p class="text-gray-700">

                                {{ $transaksi->user->telepon ?? '-' }}

                            </p>

                        </div>

                        <div class="pt-5 border-t border-gray-200">

                            <p class="text-xs uppercase tracking-wide text-gray-400 mb-2">

                                Alamat Pengiriman

                            </p>

                            <p class="text-gray-700 break-words leading-relaxed">

                                {{ $transaksi->alamat_tujuan }}

                            </p>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-2xl shadow border border-gray-200">

                    <div class="px-6 py-5 border-b">

                        <h2 class="font-bold text-gray-900">

                            Ringkasan Pembayaran

                        </h2>

                    </div>

                    <div class="p-6 space-y-4">

                        <div class="flex justify-between">

                            <span class="text-gray-500">

                                Subtotal

                            </span>

                            <span class="font-medium">

                                Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}

                            </span>

                        </div>

                        <div class="flex justify-between">

                            <span class="text-gray-500">

                                Ongkos Kirim

                            </span>

                            <span class="text-green-600 font-medium">

                                Gratis

                            </span>

                        </div>

                        <div class="border-t pt-4 flex justify-between">

                            <span class="font-semibold">

                                Total

                            </span>

                            <span class="text-red-600 font-bold text-xl">

                                Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}

                            </span>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-2xl shadow border border-gray-200">

                    <div class="px-6 py-5 border-b">

                        <h2 class="font-bold">

                            Pembayaran

                        </h2>

                    </div>

                    <div class="p-6">

                        <div class="bg-gray-50 rounded-xl p-4 border">

                            <p class="text-xs text-gray-400">

                                Metode

                            </p>

                            <p class="font-semibold text-lg truncate">

                                {{ $transaksi->metode_bayar }}

                            </p>

                            @if ($transaksi->payment_type)
                                <p class="text-sm text-gray-500 truncate mt-1">

                                    {{ strtoupper($transaksi->payment_type) }}

                                </p>
                            @endif

                        </div>

                        <div class="mt-5">

                            @if ($transaksi->payment_status == 'paid')
                                <span class="inline-flex px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold">

                                    Pembayaran Berhasil

                                </span>
                            @elseif($transaksi->payment_status == 'pending')
                                <span
                                    class="inline-flex px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 font-semibold">

                                    Menunggu Pembayaran

                                </span>
                            @elseif($transaksi->payment_status == 'expire')
                                <span class="inline-flex px-4 py-2 rounded-full bg-red-100 text-red-700 font-semibold">

                                    Pembayaran Kadaluwarsa

                                </span>
                            @else
                                <span class="inline-flex px-4 py-2 rounded-full bg-red-100 text-red-700 font-semibold">

                                    Pembayaran Gagal

                                </span>
                            @endif

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-2xl shadow border border-gray-200">

                    <div class="px-6 py-5 border-b">

                        <h2 class="font-bold">

                            Resi Pengiriman

                        </h2>

                    </div>

                    <div class="p-6">

                        @if ($transaksi->status == 'dikirim' || $transaksi->status == 'selesai')
                            <div class="bg-blue-50 rounded-xl border border-blue-100 p-4">

                                <p class="text-xs text-gray-500">

                                    Nomor Resi

                                </p>

                                <p class="font-mono font-bold text-blue-700 mt-2 break-all">

                                    {{ $transaksi->resi }}

                                </p>

                                <button onclick="copyResi('{{ $transaksi->resi }}')"
                                    class="mt-4 w-full bg-blue-600 hover:bg-blue-700 transition text-white rounded-lg py-2">

                                    Copy Resi

                                </button>

                            </div>
                        @else
                            <div class="rounded-xl bg-yellow-50 border border-yellow-200 p-4">

                                <p class="font-semibold text-yellow-700">

                                    Resi Belum Tersedia

                                </p>

                                <p class="text-sm text-yellow-600 mt-2 leading-relaxed">

                                    Nomor resi akan dibuat otomatis ketika pesanan telah dikirim.

                                </p>

                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function copyResi(resi) {

            navigator.clipboard.writeText(resi)
                .then(() => {

                    showCopyAlert(
                        'success',
                        'Resi Berhasil Disalin',
                        'Nomor resi berhasil disalin ke clipboard.'
                    );

                })
                .catch(() => {

                    showCopyAlert(
                        'error',
                        'Gagal',
                        'Nomor resi gagal disalin.'
                    );

                });

        }

        function showCopyAlert(type, title, message) {

            const container = document.getElementById('copy-alert-container');

            const bg = type === 'success' ?
                'bg-green-600' :
                'bg-red-600';

            const alert = document.createElement('div');

            alert.className =
                `${bg} text-white rounded-lg shadow-lg p-4 flex justify-between items-start`;

            alert.innerHTML = `
        <div>
            <h3 class="font-semibold">${title}</h3>
            <p class="text-sm mt-1">${message}</p>
        </div>

        <button class="ml-4 font-bold">
            ✕
        </button>
    `;

            container.appendChild(alert);

            const btn = alert.querySelector('button');

            btn.onclick = () => alert.remove();

            setTimeout(() => {

                alert.remove();

            }, 3000);

        }
    </script>
@endsection
