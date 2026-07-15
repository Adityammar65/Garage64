@extends('template.customer')

@section('title', 'Order Saya')

@section('content')

    <section class="max-w-7xl mx-auto px-4 py-10">

        <div class="mb-10">

            <h1 class="text-4xl font-bold">
                Order Saya
            </h1>

            <p class="text-gray-500 mt-2">
                Lihat seluruh riwayat transaksi dan status pesanan Anda.
            </p>

        </div>

        @forelse($orders as $order)

            <div class="bg-white rounded-3xl border border-gray-200 shadow-sm hover:shadow-lg transition p-6 mb-6">

                <div class="flex justify-between items-center">

                    <div>

                        <h2 class="font-bold text-xl">

                            {{ $order->kode_transaksi }}

                        </h2>

                        <p class="text-gray-500 text-sm">

                            {{ $order->created_at->format('d M Y H:i') }}

                        </p>

                    </div>

                    <div>

                        @switch($order->status)
                            @case('pending')
                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full font-semibold">
                                    Pending
                                </span>
                            @break

                            @case('paid')
                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">
                                    Dibayar
                                </span>
                            @break

                            @case('diproses')
                                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-semibold">
                                    Diproses
                                </span>
                            @break

                            @case('dikirim')
                                <span class="bg-purple-100 text-purple-700 px-4 py-2 rounded-full font-semibold">
                                    Dikirim
                                </span>
                            @break

                            @case('selesai')
                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">
                                    Selesai
                                </span>
                            @break

                            @default
                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full font-semibold">
                                    {{ ucfirst($order->status) }}
                                </span>
                        @endswitch

                    </div>

                </div>

                <div class="border-t my-5"></div>

                @foreach ($order->detailTransaksi as $detail)
                    <div class="flex items-center gap-5 py-4">

                        <img src="{{ asset('storage/' . $detail->produk->gambar) }}"
                            class="w-20 h-20 rounded-xl object-cover">

                        <div class="flex-1">

                            <h3 class="font-semibold">

                                {{ $detail->produk->nama_produk }}

                            </h3>

                            <p class="text-gray-500">

                                Qty {{ $detail->qty }}

                            </p>

                        </div>

                        <div class="font-bold">

                            Rp {{ number_format($detail->subtotal, 0, ',', '.') }}

                        </div>

                    </div>
                @endforeach

                <div class="border-t my-5"></div>

                <div class="flex justify-between items-center">

                    <div>

                        <span class="text-gray-500">

                            Total Pembayaran

                        </span>

                        <div class="text-2xl font-bold text-yellow-500">

                            Rp {{ number_format($order->total_harga, 0, ',', '.') }}

                        </div>

                    </div>

                    <a href="/orders/{{ $order->id_transaksi }}"
                        class="px-6 py-3 bg-yellow-500 hover:bg-yellow-400 rounded-xl font-semibold transition">

                        Detail

                    </a>

                </div>

            </div>

            @empty

                <div class="bg-white rounded-3xl shadow p-20 text-center">

                    <h2 class="text-3xl font-bold">

                        Belum ada transaksi

                    </h2>

                    <p class="text-gray-500 mt-3">

                        Semua transaksi yang Anda lakukan akan muncul di sini.

                    </p>

                    <a href="{{ url('/produk') }}"
                        class="inline-block mt-8 bg-red-600 hover:bg-red-700 px-8 py-4 rounded-xl font-bold text-white">

                        Mulai Belanja

                    </a>

                </div>

            @endforelse

        </section>

    @endsection
