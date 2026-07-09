@extends('template.customer')

@section('title', $produk->nama_produk)

@section('content')

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="grid lg:grid-cols-2 gap-12 items-start">

            {{-- FOTO --}}
            <div>

                <div class="bg-white rounded-3xl shadow-lg border border-gray-200 overflow-hidden">

                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}"
                        class="w-full h-[400px] object-cover rounded-2xl">

                </div>

            </div>

            {{-- DETAIL --}}
            <div>

                <span class="inline-block px-4 py-1 rounded-full bg-gray-100 text-gray-700 text-sm font-semibold">
                    {{ $produk->brand }}
                </span>

                <h1 class="mt-5 text-4xl font-extrabold text-gray-900 leading-tight">
                    {{ $produk->nama_produk }}
                </h1>

                <div class="mt-4 flex items-center gap-3">

                    <span class="text-gray-500">
                        {{ $produk->nama_produk }}
                    </span>

                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">
                        {{ $produk->kategori->nama_kategori }}
                    </span>

                </div>

                <div class="mt-6">

                    <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold">
                        Stok tersedia
                    </span>

                </div>

                <div class="mt-8">

                    <h2 class="text-5xl font-extrabold text-yellow-500 mt-2">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </h2>

                </div>

                <div class="mt-8 flex items-center gap-4">

                    <span class="bg-gray-200 p-2 rounded-xl font-semibold text-gray-700">
                        {{ $produk->skala }}
                    </span>

                </div>

                <div class="mt-10 bg-gray-50 rounded-2xl p-6 border border-gray-200">

                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        Deskripsi Produk
                    </h3>

                    <p class="leading-8 text-gray-600">
                        {{ $produk->deskripsi }}
                    </p>

                </div>

                {{-- ACTION --}}
                <div class="mt-10 flex gap-4 justify-center">

                    <button
                        class="px-8 py-4 rounded-2xl bg-yellow-500 hover:bg-yellow-400 text-black font-bold text-lg shadow-lg hover:shadow-xl transition duration-300">
                        + Keranjang
                    </button>

                    <a href="{{ url()->previous() }}"
                        class="px-8 py-4 rounded-2xl bg-gray-500 border border-gray-300 text-white font-semibold hover:bg-gray-600 transition duration-300">
                        Kembali
                    </a>

                </div>

            </div>

        </div>

    </section>

@endsection
