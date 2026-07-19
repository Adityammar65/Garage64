@extends('template.customer')

@section('title', 'Order Saya')

@section('content')

    @php

        $statusConfig = [
            'pending' => [
                'step' => 1,
                'label' => 'Pending',
                'badge' => 'bg-yellow-100 text-yellow-700',
            ],
            'paid' => [
                'step' => 2,
                'label' => 'Dibayar',
                'badge' => 'bg-green-100 text-green-700',
            ],
            'diproses' => [
                'step' => 3,
                'label' => 'Diproses',
                'badge' => 'bg-blue-100 text-blue-700',
            ],
            'dikirim' => [
                'step' => 4,
                'label' => 'Dikirim',
                'badge' => 'bg-purple-100 text-purple-700',
            ],
            'selesai' => [
                'step' => 5,
                'label' => 'Selesai',
                'badge' => 'bg-green-100 text-green-700',
            ],
        ];

    @endphp

    <section class="max-w-7xl mx-auto px-4 py-10">

        {{-- Header --}}
        <div class="mb-10">

            <h1 class="text-4xl font-bold text-gray-900">

                Order Saya

            </h1>

            <p class="text-gray-500 mt-2">

                Pantau seluruh transaksi dan perkembangan pesanan Anda.

            </p>

        </div>

        @forelse($orders as $order)

            @php

                $status = $statusConfig[$order->status] ?? [
                    'step' => 1,
                    'label' => ucfirst($order->status),
                    'badge' => 'bg-gray-100 text-gray-700',
                ];

                $step = $status['step'];

                $jumlahProduk = $order->detailTransaksi->count();

                $jumlahItem = $order->detailTransaksi->sum('qty');

            @endphp

            <div
                class="bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 overflow-hidden mb-8">

                <div
                    class="px-7 py-6 border-b border-gray-200 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <div>

                        <div class="flex items-center gap-3 flex-wrap">

                            <h2 class="text-2xl font-bold text-gray-900">

                                {{ $order->order_id }}

                            </h2>

                            <span class="px-4 py-1.5 rounded-full text-sm font-semibold {{ $status['badge'] }}">

                                {{ $status['label'] }}

                            </span>

                        </div>

                        <div class="mt-3 flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-500">

                            <span>

                                {{ $order->created_at->format('d M Y • H:i') }}

                            </span>

                            <span>

                                {{ $jumlahProduk }} Produk

                            </span>

                            <span>

                                {{ $jumlahItem }} Item

                            </span>

                        </div>

                    </div>

                    <div class="text-left lg:text-right">

                        <p class="text-sm text-gray-500">

                            Total Pembayaran

                        </p>

                        <p class="text-3xl font-bold text-red-600">

                            Rp {{ number_format($order->total_harga, 0, ',', '.') }}

                        </p>

                    </div>

                </div>

                {{-- Timeline --}}
                <div class="px-7 py-7 bg-gray-50">

                    <div class="relative">

                        <div class="absolute left-0 right-0 top-5 h-1 bg-gray-200 rounded-full">

                        </div>

                        <div class="absolute left-0 top-5 h-1 bg-red-500 rounded-full transition-all duration-500"
                            style="width: {{ (($step - 1) / 4) * 100 }}%">

                        </div>

                        <div class="relative grid grid-cols-5">

                            @foreach (['Pending', 'Dibayar', 'Diproses', 'Dikirim', 'Selesai'] as $i => $label)
                                @php
                                    $active = $i + 1 <= $step;
                                @endphp

                                <div class="text-center">

                                    <div
                                        class="mx-auto w-10 h-10 rounded-full flex items-center justify-center font-bold border-4
                                    {{ $active ? 'bg-red-600 border-red-600 text-white' : 'bg-white border-gray-300 text-gray-400' }}">

                                        {{ $i + 1 }}

                                    </div>

                                    <p
                                        class="mt-3 text-sm font-medium
                                    {{ $active ? 'text-red-600' : 'text-gray-400' }}">

                                        {{ $label }}

                                    </p>

                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>

                {{-- Produk --}}
                <div class="divide-y divide-gray-200">
                    @php
                        $produkPertama = $order->detailTransaksi->first();
                    @endphp

                    @if ($produkPertama)
                        <div class="p-7 flex gap-6 items-center">

                            <img src="{{ asset('storage/' . $produkPertama->produk->gambar) }}"
                                class="w-28 h-28 rounded-2xl object-cover border">

                            <div class="flex-1 min-w-0">

                                <h3 class="font-bold text-lg text-gray-900 truncate">

                                    {{ $produkPertama->produk->nama_produk }}

                                </h3>

                                <div class="flex flex-wrap gap-2 mt-2">

                                    @if ($produkPertama->produk->brand)
                                        <span class="px-3 py-1 rounded-full bg-gray-100 text-xs">

                                            {{ $produkPertama->produk->brand }}

                                        </span>
                                    @endif

                                    <span class="px-3 py-1 rounded-full bg-red-50 text-red-600 text-xs">

                                        Qty {{ $produkPertama->qty }}

                                    </span>

                                </div>

                                @if ($jumlahProduk > 1)
                                    <p class="mt-3 text-sm text-gray-500">

                                        +{{ $jumlahProduk - 1 }}
                                        produk lainnya

                                    </p>
                                @endif

                            </div>

                            <div class="text-right">

                                <p class="text-xs text-gray-400">

                                    Subtotal

                                </p>

                                <p class="text-2xl font-bold text-red-600">

                                    Rp {{ number_format($produkPertama->subtotal, 0, ',', '.') }}

                                </p>

                            </div>

                        </div>
                    @endif

                </div>

                <div class="bg-gray-50 border-t border-gray-200">

                    <div class="px-7 py-6 flex flex-col lg:flex-row justify-between gap-6">

                        <div class="grid grid-cols-2 gap-8">

                            <div>

                                <p class="text-sm text-gray-500">

                                    Total Produk

                                </p>

                                <p class="font-bold text-lg text-gray-900">

                                    {{ $jumlahProduk }}

                                </p>

                            </div>

                            <div>

                                <p class="text-sm text-gray-500">

                                    Total Item

                                </p>

                                <p class="font-bold text-lg text-gray-900">

                                    {{ $jumlahItem }}

                                </p>

                            </div>

                        </div>

                        <div class="lg:text-right">

                            <p class="text-sm text-gray-500">

                                Total Pembayaran

                            </p>

                            <p class="text-3xl font-bold text-red-600">

                                Rp {{ number_format($order->total_harga, 0, ',', '.') }}

                            </p>

                        </div>

                    </div>

                </div>

                {{-- Action --}}
                <div
                    class="px-7 py-6 border-t border-gray-200 bg-white flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="text-sm text-gray-500">

                        @if ($order->status == 'pending')
                            Menunggu pembayaran untuk melanjutkan proses pesanan.
                        @elseif($order->status == 'paid')
                            Pembayaran telah diterima dan pesanan akan segera diproses.
                        @elseif($order->status == 'diproses')
                            Pesanan sedang diproses oleh tim Garage64.
                        @elseif($order->status == 'dikirim')
                            Pesanan sedang dalam perjalanan menuju alamat Anda.
                        @elseif($order->status == 'selesai')
                            Terima kasih telah berbelanja di Garage64.
                        @else
                            Status pesanan: {{ ucfirst($order->status) }}
                        @endif

                    </div>

                    <div class="flex flex-wrap items-center gap-3">

                        <a href="{{ url('/order/' . $order->id_transaksi) }}"
                            class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-gray-300 bg-white hover:bg-gray-100 transition font-semibold text-gray-700">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12H9m12 0A9 9 0 1112 3a9 9 0 019 9zm-9 4h.01m-.01-8h.01" />

                            </svg>

                            Detail Order

                        </a>

                        @if ($order->status == 'dikirim')
                            <form action="{{ url('/order/' . $order->id_transaksi . '/selesai') }}" method="POST">

                                @csrf

                                <button type="submit" onclick="return confirm('Konfirmasi bahwa pesanan telah diterima?')"
                                    class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold transition">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />

                                    </svg>

                                    Pesanan Diterima

                                </button>

                            </form>
                        @endif

                        @if ($order->status == 'selesai')
                            <a href="{{ url('/produk') }}"
                                class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold transition">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4m1.6 8L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 19a1 1 0 100 2 1 1 0 000-2zm8 0a1 1 0 100 2 1 1 0 000-2" />

                                </svg>

                                Beli Lagi

                            </a>
                        @endif

                    </div>

                </div>

            </div>
        @empty

            <div class="bg-white border border-gray-200 rounded-3xl shadow-sm overflow-hidden">

                <div class="px-8 py-20 flex flex-col items-center text-center">

                    <div class="w-28 h-28 rounded-full bg-red-50 flex items-center justify-center mb-8">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-red-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M3 3h2l.4 2m0 0L7 13h10l4-8H5.4M7 13l-1.5 6M17 13l1.5 6M9 19a1 1 0 100 2 1 1 0 000-2zm8 0a1 1 0 100 2 1 1 0 000-2" />

                        </svg>

                    </div>

                    <h2 class="text-3xl font-bold text-gray-900">

                        Belum Ada Pesanan

                    </h2>

                    <p class="mt-4 text-gray-500 max-w-lg leading-relaxed">

                        Semua transaksi yang Anda lakukan akan muncul di halaman ini.
                        Yuk mulai koleksi diecast favorit Anda sekarang juga!

                    </p>

                    <div class="mt-10 flex flex-wrap justify-center gap-4">

                        <a href="{{ url('/produk') }}"
                            class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold transition shadow-md hover:shadow-lg">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4m1.6 8L5.4 5M7 13l-1.5 6M17 13l1.5 6" />

                            </svg>

                            Mulai Belanja

                        </a>

                        <a href="{{ url('/') }}"
                            class="inline-flex items-center gap-2 px-8 py-4 rounded-xl border border-gray-300 bg-white hover:bg-gray-100 text-gray-700 font-semibold transition">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m0-8H5" />

                            </svg>

                            Kembali ke Beranda

                        </a>

                    </div>

                </div>

            </div>

        @endforelse

    </section>

@endsection
