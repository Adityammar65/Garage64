@extends('template.customer')

@section('title', 'Keranjang Belanja')

@section('content')

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Judul --}}
    <div class="flex items-center justify-between mb-10">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-900">
                Keranjang Belanja
            </h1>
            <p class="text-gray-500 mt-2">
                Periksa kembali produk sebelum melanjutkan ke pembayaran.
            </p>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">

        {{-- LIST PRODUK --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- ITEM --}}
            <div
                class="group bg-white rounded-3xl border border-gray-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 p-6 flex gap-6">

                <img
                    src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b"
                    class="w-36 h-36 object-cover rounded-2xl">

                <div class="flex-1">

                    <h2 class="text-2xl font-bold text-gray-900">
                        Nissan GT-R R34
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Hot Wheels • Skala 1:64
                    </p>

                    <p
                        class="inline-block mt-5 px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 font-bold text-xl">
                        Rp 149.000
                    </p>

                </div>

                <div class="flex flex-col justify-between items-end">

                    <button
                        class="text-red-500 hover:text-red-600 font-semibold hover:underline">
                        Hapus
                    </button>

                    <div class="flex items-center gap-3">

                        <button
                            class="w-10 h-10 rounded-xl bg-gray-100 hover:bg-gray-200 font-bold transition">
                            −
                        </button>

                        <span class="text-lg font-bold w-8 text-center">
                            1
                        </span>

                        <button
                            class="w-10 h-10 rounded-xl bg-yellow-500 hover:bg-yellow-400 text-white font-bold transition">
                            +
                        </button>

                    </div>

                </div>

            </div>

            {{-- ITEM --}}
            <div
                class="group bg-white rounded-3xl border border-gray-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 p-6 flex gap-6">

                <img
                    src="https://images.unsplash.com/photo-1511919884226-fd3cad34687c"
                    class="w-36 h-36 object-cover rounded-2xl">

                <div class="flex-1">

                    <h2 class="text-2xl font-bold text-gray-900">
                        Porsche 911 GT3
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Mini GT • Skala 1:64
                    </p>

                    <p
                        class="inline-block mt-5 px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 font-bold text-xl">
                        Rp 550.000
                    </p>

                </div>

                <div class="flex flex-col justify-between items-end">

                    <button
                        class="text-red-500 hover:text-red-600 font-semibold hover:underline">
                        Hapus
                    </button>

                    <div class="flex items-center gap-3">

                        <button
                            class="w-10 h-10 rounded-xl bg-gray-100 hover:bg-gray-200 font-bold transition">
                            −
                        </button>

                        <span class="text-lg font-bold w-8 text-center">
                            1
                        </span>

                        <button
                            class="w-10 h-10 rounded-xl bg-yellow-500 hover:bg-yellow-400 text-white font-bold transition">
                            +
                        </button>

                    </div>

                </div>

            </div>

        </div>

        {{-- RINGKASAN BELANJA --}}
        <div>

            <div
                class="sticky top-24 bg-white rounded-3xl border border-gray-200 shadow-lg p-7">

                <h2 class="text-2xl font-bold text-gray-900 mb-6">
                    Ringkasan Belanja
                </h2>

                <div class="space-y-4">

                    <div class="flex justify-between text-gray-600">
                        <span>Subtotal</span>
                        <span class="font-semibold">Rp 699.000</span>
                    </div>

                    <div class="flex justify-between text-gray-600">
                        <span>Ongkir</span>
                        <span class="font-semibold">Rp 20.000</span>
                    </div>

                </div>

                <div class="border-t border-dashed my-6"></div>

                <div class="flex justify-between items-center">

                    <span class="text-xl font-bold">
                        Total
                    </span>

                    <span class="text-3xl font-extrabold text-yellow-500">
                        Rp 719.000
                    </span>

                </div>

                <button
                    class="w-full mt-8 py-4 rounded-2xl bg-yellow-500 hover:bg-yellow-400 text-black font-bold text-lg shadow-lg hover:shadow-xl transition duration-300">

                    Checkout

                </button>

                <a
                    href="/products"
                    class="block text-center mt-4 py-4 rounded-2xl border border-gray-300 font-semibold hover:bg-gray-100 transition duration-300">

                    Lanjut Belanja

                </a>

            </div>

        </div>

    </div>

</section>

@endsection