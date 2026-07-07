@extends('template.customer')

@section('title', 'Nissan GT-R R34')

@section('content')

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <div class="grid lg:grid-cols-2 gap-12 items-start">

        {{-- FOTO --}}
        <div>

            <div class="bg-white rounded-3xl shadow-lg border border-gray-200 overflow-hidden p-6">

                <img
                    src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b"
                    alt="Nissan GT-R R34"
                    class="w-full h-[430px] object-cover rounded-2xl hover:scale-105 transition duration-500">

            </div>

        </div>

        {{-- DETAIL --}}
        <div>

            {{-- Brand --}}
            <span class="inline-block px-4 py-1 rounded-full bg-gray-100 text-gray-700 text-sm font-semibold">
                Hot Wheels
            </span>

            {{-- Nama Produk --}}
            <h1 class="mt-5 text-4xl font-extrabold text-gray-900 leading-tight">
                Nissan GT-R R34
            </h1>

            {{-- Kategori --}}
            <div class="mt-4 flex items-center gap-3">

                <span class="text-gray-500">
                    Kategori :
                </span>

                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">
                    JDM
                </span>

            </div>

            {{-- Status --}}
            <div class="mt-6">

                <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold">
                    ✓ Stok tersedia
                </span>

            </div>

            {{-- Harga --}}
            <div class="mt-8">

                <p class="text-gray-500 text-sm uppercase tracking-wider">
                    Harga
                </p>

                <h2 class="text-5xl font-extrabold text-yellow-500 mt-2">
                    Rp 149.000
                </h2>

            </div>

            {{-- Skala --}}
            <div class="mt-8 flex items-center gap-4">

                <span class="font-semibold text-gray-700">
                    Skala
                </span>

                <span class="px-4 py-2 rounded-xl bg-gray-100 text-gray-700">
                    1 : 64
                </span>

            </div>

            {{-- Deskripsi --}}
            <div class="mt-10 bg-gray-50 rounded-2xl p-6 border border-gray-200">

                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    Deskripsi Produk
                </h3>

                <p class="leading-8 text-gray-600">
                    Diecast premium Nissan GT-R R34 dengan detail tinggi,
                    material metal berkualitas, dan cocok untuk koleksi.
                </p>

            </div>

            {{-- ACTION --}}
            <div class="mt-10 flex gap-4">

                <button
                    class="flex-1 py-4 rounded-2xl bg-yellow-500 hover:bg-yellow-400 text-black font-bold text-lg shadow-lg hover:shadow-xl transition duration-300">
                    + Keranjang
                </button>

                <a
                    href="{{ url('/produk') }}"
                    class="px-8 py-4 rounded-2xl border border-gray-300 text-gray-700 font-semibold hover:bg-gray-100 transition duration-300">
                    Kembali
                </a>

            </div>

        </div>

    </div>

</section>

@endsection