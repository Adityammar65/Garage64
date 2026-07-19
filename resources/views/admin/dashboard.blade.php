@extends('template.admin')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard')

@section('content')

    <div class="space-y-6">

        {{-- Card Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

            {{-- Produk --}}
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow">

                <p class="text-gray-400 text-sm">
                    Total Produk
                </p>

                <h2 class="text-4xl font-bold text-white mt-3">
                    {{ $totalProduk }}
                </h2>

            </div>

            {{-- Order --}}
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow">

                <p class="text-gray-400 text-sm">
                    Total Order
                </p>

                <h2 class="text-4xl font-bold text-white mt-3">
                    {{ $totalOrder }}
                </h2>

            </div>

            {{-- Pendapatan --}}
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow">

                <p class="text-gray-400 text-sm">
                    Pendapatan
                </p>

                <h2 class="text-3xl font-bold text-green-400 mt-3">

                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}

                </h2>

            </div>

            {{-- Support --}}
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow">

                <p class="text-gray-400 text-sm">
                    Tiket Support
                </p>

                <h2 class="text-4xl font-bold text-yellow-400 mt-3">
                    {{ $totalSupport }}
                </h2>

            </div>

        </div>

        {{-- Produk Terlaris & Status Order --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            {{-- Produk Terlaris --}}
            <div class="xl:col-span-2 bg-gray-800 rounded-xl border border-gray-700 p-6">

                <h2 class="text-xl font-bold text-white mb-5">
                    Produk Terlaris
                </h2>

                @if ($topProduct)
                    <div class="flex flex-col md:flex-row gap-6">

                        <div class="w-full md:w-56">

                            <img src="{{ asset('storage/' . $topProduct->gambar) }}" alt="{{ $topProduct->nama_produk }}"
                                class="w-full h-60 object-cover rounded-lg border border-gray-700">

                        </div>

                        <div class="flex-1">

                            <span class="bg-red-600 text-white px-3 py-1 rounded-full text-xs font-semibold">

                                BEST SELLER

                            </span>

                            <h2 class="text-3xl font-bold text-white mt-4">

                                {{ $topProduct->nama_produk }}

                            </h2>

                            <p class="text-gray-400 mt-2">

                                Brand :
                                <span class="text-white">

                                    {{ $topProduct->brand }}

                                </span>

                            </p>

                            <p class="text-gray-400">

                                Harga :
                                <span class="text-green-400 font-semibold">

                                    Rp {{ number_format($topProduct->harga, 0, ',', '.') }}

                                </span>

                            </p>

                            <p class="text-gray-400">

                                Stok :
                                <span class="text-white">

                                    {{ $topProduct->stok }}

                                </span>

                            </p>

                            <div class="grid grid-cols-2 gap-4 mt-6">

                                <div class="bg-gray-900 rounded-lg p-4">

                                    <p class="text-gray-400 text-sm">

                                        Total Terjual

                                    </p>

                                    <h3 class="text-3xl font-bold text-red-500">

                                        {{ $topProduct->total_terjual }}

                                    </h3>

                                </div>

                                <div class="bg-gray-900 rounded-lg p-4">

                                    <p class="text-gray-400 text-sm">

                                        Pendapatan

                                    </p>

                                    <h3 class="text-2xl font-bold text-green-400">

                                        Rp
                                        {{ number_format($topProduct->harga * $topProduct->total_terjual, 0, ',', '.') }}

                                    </h3>

                                </div>

                            </div>

                        </div>

                    </div>
                @else
                    <div class="text-center py-16 text-gray-400">

                        Belum ada transaksi.

                    </div>
                @endif

            </div>

            {{-- Status Order --}}
            <div class="bg-gray-800 rounded-xl border border-gray-700 p-6">

                <h2 class="text-xl font-bold text-white mb-5">

                    Status Pesanan

                </h2>

                <div class="space-y-4">

                    <div
                        class="flex justify-between items-center bg-yellow-500/10 border border-yellow-500/20 rounded-lg px-4 py-4">

                        <span class="text-yellow-300">

                            Pending

                        </span>

                        <span class="text-2xl font-bold text-yellow-400">

                            {{ $pending }}

                        </span>

                    </div>

                    <div
                        class="flex justify-between items-center bg-blue-500/10 border border-blue-500/20 rounded-lg px-4 py-4">

                        <span class="text-blue-300">

                            Diproses

                        </span>

                        <span class="text-2xl font-bold text-blue-400">

                            {{ $diproses }}

                        </span>

                    </div>

                    <div
                        class="flex justify-between items-center bg-green-500/10 border border-green-500/20 rounded-lg px-4 py-4">

                        <span class="text-green-300">

                            Selesai

                        </span>

                        <span class="text-2xl font-bold text-green-400">

                            {{ $selesai }}

                        </span>

                    </div>

                </div>

            </div>

        </div>

        {{-- Top 5 Produk Terlaris --}}
        <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">

            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-700">

                <div>

                    <h2 class="text-xl font-bold text-white">
                        Top 5 Produk Terlaris
                    </h2>

                    <p class="text-sm text-gray-400">
                        Produk dengan penjualan tertinggi
                    </p>

                </div>

                <a href="{{ url('/admin/produk') }}" class="text-red-500 hover:text-red-400 text-sm font-medium">

                    Lihat Semua →

                </a>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-gray-900">

                        <tr class="text-gray-300 text-sm">

                            <th class="px-6 py-4 text-left">Produk</th>
                            <th class="px-6 py-4 text-center">Kode</th>
                            <th class="px-6 py-4 text-center">Harga</th>
                            <th class="px-6 py-4 text-center">Terjual</th>
                            <th class="px-6 py-4 text-center">Stok</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($bestSeller as $produk)
                            <tr class="border-t border-gray-700 hover:bg-gray-700/40 transition">

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-4">

                                        <img src="{{ asset('storage/' . $produk->gambar) }}"
                                            class="w-14 h-14 rounded-lg object-cover border border-gray-700">

                                        <div>

                                            <h3 class="font-semibold text-white">

                                                {{ $produk->nama_produk }}

                                            </h3>

                                            <p class="text-sm text-gray-400">

                                                {{ $produk->brand }}

                                            </p>

                                        </div>

                                    </div>

                                </td>

                                <td class="text-center text-white">

                                    {{ $produk->kode_produk }}

                                </td>

                                <td class="text-center text-green-400 font-semibold">

                                    Rp {{ number_format($produk->harga, 0, ',', '.') }}

                                </td>

                                <td class="text-center">

                                    <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full">

                                        {{ $produk->total_terjual }}

                                    </span>

                                </td>

                                <td class="text-center">

                                    @if ($produk->stok <= 5)
                                        <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full">

                                            {{ $produk->stok }}

                                        </span>
                                    @elseif($produk->stok <= 15)
                                        <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full">

                                            {{ $produk->stok }}

                                        </span>
                                    @else
                                        <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">

                                            {{ $produk->stok }}

                                        </span>
                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center py-10 text-gray-400">

                                    Belum ada data penjualan.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- Pesanan Terbaru --}}
        <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">

            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-700">

                <div>

                    <h2 class="text-xl font-bold text-white">
                        Pesanan Terbaru
                    </h2>

                    <p class="text-sm text-gray-400">
                        5 transaksi terbaru pelanggan
                    </p>

                </div>

                <a href="{{ url('/admin/order') }}" class="text-red-500 hover:text-red-400 text-sm font-medium">

                    Lihat Semua →

                </a>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-gray-900">

                        <tr class="text-gray-300 text-sm">

                            <th class="px-6 py-4 text-left">
                                Order ID
                            </th>

                            <th class="px-6 py-4 text-left">
                                Customer
                            </th>

                            <th class="px-6 py-4 text-center">
                                Total
                            </th>

                            <th class="px-6 py-4 text-center">
                                Pembayaran
                            </th>

                            <th class="px-6 py-4 text-center">
                                Status
                            </th>

                            <th class="px-6 py-4 text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($latestOrders as $order)
                            <tr class="border-t border-gray-700 hover:bg-gray-700/40 transition">

                                <td class="px-6 py-4">

                                    <div>

                                        <h3 class="text-white font-semibold">

                                            {{ $order->order_id }}

                                        </h3>

                                        <p class="text-xs text-gray-400">

                                            {{ $order->created_at->format('d M Y H:i') }}

                                        </p>

                                    </div>

                                </td>

                                <td class="px-6 py-4">

                                    <div>

                                        <h3 class="text-white">

                                            {{ $order->user->username }}

                                        </h3>

                                        <p class="text-gray-400 text-sm">

                                            {{ $order->user->email }}

                                        </p>

                                    </div>

                                </td>

                                <td class="px-6 py-4 text-center">

                                    <span class="text-green-400 font-semibold">

                                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}

                                    </span>

                                </td>

                                <td class="px-6 py-4 text-center">

                                    @switch($order->payment_status)
                                        @case('paid')
                                            <span class="px-3 py-1 rounded-full bg-green-500/20 text-green-400 text-xs">

                                                Paid

                                            </span>
                                        @break

                                        @case('pending')
                                            <span class="px-3 py-1 rounded-full bg-yellow-500/20 text-yellow-400 text-xs">

                                                Pending

                                            </span>
                                        @break

                                        @case('expire')
                                            <span class="px-3 py-1 rounded-full bg-red-500/20 text-red-400 text-xs">

                                                Expired

                                            </span>
                                        @break

                                        @default
                                            <span class="px-3 py-1 rounded-full bg-gray-600 text-white text-xs">

                                                {{ ucfirst($order->payment_status) }}

                                            </span>
                                    @endswitch

                                </td>

                                <td class="px-6 py-4 text-center">

                                    @switch($order->status)
                                        @case('diproses')
                                            <span class="px-3 py-1 rounded-full bg-blue-500/20 text-blue-400 text-xs">

                                                Diproses

                                            </span>
                                        @break

                                        @case('dikirim')
                                            <span class="px-3 py-1 rounded-full bg-purple-500/20 text-purple-400 text-xs">

                                                Dikirim

                                            </span>
                                        @break

                                        @case('selesai')
                                            <span class="px-3 py-1 rounded-full bg-green-500/20 text-green-400 text-xs">

                                                Selesai

                                            </span>
                                        @break

                                        @case('dibatalkan')
                                            <span class="px-3 py-1 rounded-full bg-red-500/20 text-red-400 text-xs">

                                                Dibatalkan

                                            </span>
                                        @break

                                        @default
                                            <span class="px-3 py-1 rounded-full bg-gray-600 text-white text-xs">

                                                {{ ucfirst($order->status) }}

                                            </span>
                                    @endswitch

                                </td>

                                <td class="px-6 py-4 text-center">

                                    <a href="{{ url('/admin/order/' . $order->id_transaksi) }}"
                                        class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-white text-sm transition">

                                        Detail

                                    </a>

                                </td>

                            </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="py-10 text-center text-gray-400">

                                        Belum ada transaksi.

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Keluhan Terbaru --}}
            <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">

                <div class="flex justify-between items-center px-6 py-4 border-b border-gray-700">

                    <div>

                        <h2 class="text-xl font-bold text-white">
                            Keluhan Terbaru
                        </h2>

                        <p class="text-sm text-gray-400">
                            Tiket support terbaru dari pelanggan
                        </p>

                    </div>

                    <a href="{{ url('/admin/support') }}" class="text-red-500 hover:text-red-400 text-sm font-medium">

                        Lihat Semua →

                    </a>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-gray-900">

                            <tr class="text-gray-300 text-sm">

                                <th class="px-6 py-4 text-left">
                                    User
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Keluhan
                                </th>

                                <th class="px-6 py-4 text-center">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-center">
                                    Tanggal
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($latestServices as $service)
                                <tr class="border-t border-gray-700 hover:bg-gray-700/40 transition">

                                    {{-- User --}}
                                    <td class="px-6 py-4">

                                        <div>

                                            <h3 class="font-semibold text-white">

                                                {{ $service->user->username }}

                                            </h3>

                                            <p class="text-gray-400 text-sm">

                                                {{ $service->user->email }}

                                            </p>

                                        </div>

                                    </td>

                                    {{-- Subjek & Pesan --}}
                                    <td class="px-6 py-4">

                                        <div>

                                            <h3 class="font-semibold text-white">

                                                {{ $service->subjek }}

                                            </h3>

                                            <p class="text-sm text-gray-400 mt-1">

                                                {{ \Illuminate\Support\Str::limit($service->pesan, 70) }}

                                            </p>

                                        </div>

                                    </td>

                                    {{-- Status --}}
                                    <td class="px-6 py-4 text-center">

                                        @if ($service->status == 'Menunggu')
                                            <span class="px-3 py-1 rounded-full bg-yellow-500/20 text-yellow-400 text-xs">

                                                Menunggu

                                            </span>
                                        @elseif($service->status == 'Diproses')
                                            <span class="px-3 py-1 rounded-full bg-blue-500/20 text-blue-400 text-xs">

                                                Diproses

                                            </span>
                                        @elseif($service->status == 'Selesai')
                                            <span class="px-3 py-1 rounded-full bg-green-500/20 text-green-400 text-xs">

                                                Selesai

                                            </span>
                                        @else
                                            <span class="px-3 py-1 rounded-full bg-gray-500/20 text-gray-300 text-xs">

                                                {{ $service->status }}

                                            </span>
                                        @endif

                                    </td>

                                    {{-- Tanggal --}}
                                    <td class="px-6 py-4 text-center text-gray-300">

                                        @if ($service->dibalas_pada)
                                            {{ $service->dibalas_pada->format('d M Y H:i') }}
                                        @else
                                            {{ $service->created_at->format('d M Y H:i') }}
                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="text-center py-10 text-gray-400">

                                        Belum ada tiket support.

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    @endsection
