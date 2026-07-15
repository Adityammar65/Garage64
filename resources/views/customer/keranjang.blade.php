@extends('template.customer')

@section('title', 'Keranjang Belanja')

@section('content')

    <div class="max-w-7xl mx-auto px-4 py-10">

        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            Keranjang Belanja
        </h1>

        @if ($keranjang->count())

            @php
                $total = 0;
            @endphp

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

                <table class="w-full">

                    <thead class="bg-gray-900 text-white">
                        <tr>
                            <th class="p-4 text-left">Produk</th>
                            <th class="p-4">Harga</th>
                            <th class="p-4">Jumlah</th>
                            <th class="p-4">Subtotal</th>
                            <th class="p-4">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($keranjang as $item)
                            @php
                                $total += $item->subtotal;
                            @endphp

                            <tr class="border-b hover:bg-gray-50 transition">

                                <td class="p-4">

                                    <div class="flex items-center gap-4">

                                        @if ($item->produk->gambar)
                                            <img src="{{ asset('storage/' . $item->produk->gambar) }}"
                                                class="w-24 h-24 rounded-lg object-cover">
                                        @endif

                                        <div>

                                            <h3 class="font-semibold text-lg">
                                                {{ $item->produk->nama_produk }}
                                            </h3>

                                        </div>

                                    </div>

                                </td>

                                <td class="text-center">
                                    Rp {{ number_format($item->produk->harga, 0, ',', '.') }}
                                </td>

                                <td>

                                    <div class="flex justify-center items-center gap-3">

                                        <a href="{{ url('/keranjang/kurang/' . $item->id_keranjang) }}"
                                            class="w-9 h-9 rounded-full bg-yellow-500 hover:bg-yellow-600 text-white flex items-center justify-center">

                                            -

                                        </a>

                                        <span class="font-bold text-lg">

                                            {{ $item->jumlah }}

                                        </span>

                                        <a href="{{ url('/keranjang/tambah/' . $item->id_keranjang) }}"
                                            class="w-9 h-9 rounded-full bg-green-600 hover:bg-green-700 text-white flex items-center justify-center">

                                            +

                                        </a>

                                    </div>

                                </td>

                                <td class="text-center font-semibold text-red-600">

                                    Rp {{ number_format($item->subtotal, 0, ',', '.') }}

                                </td>

                                <td class="text-center">

                                    <a href="{{ url('/keranjang/hapus/' . $item->id_keranjang) }}"
                                        onclick="return confirm('Hapus produk ini?')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">

                                        Hapus

                                    </a>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Rekomendasi Produk -->
                <div class="lg:col-span-2">

                    <h2 class="text-2xl font-bold text-gray-800 mb-5">
                        Rekomendasi Produk
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                        @foreach ($rekomendasi as $produk)
                            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition overflow-hidden">

                                @if ($produk->gambar)
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="w-full h-52 object-cover">
                                @endif

                                <div class="p-4">

                                    <h3 class="font-bold text-lg mb-2 line-clamp-2">
                                        {{ $produk->nama_produk }}
                                    </h3>

                                    <p class="text-red-600 text-xl font-bold mb-4">
                                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                    </p>

                                    <div class="flex gap-2">

                                        <a href="{{ url('/produk/detail/' . $produk->id_produk) }}"
                                            class="flex-1 border border-gray-300 hover:bg-gray-100 py-2 rounded-lg text-center font-semibold">
                                            Detail
                                        </a>

                                        <a href="{{ url('/produk/tambah-ke-keranjang/' . $produk->id_produk) }}"
                                            class="flex-1 bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg text-center font-semibold">
                                            + Keranjang
                                        </a>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

                <!-- Ringkasan Belanja -->
                <div>

                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-5">

                        <h3 class="text-2xl font-bold mb-5">
                            Ringkasan Belanja
                        </h3>

                        <div class="flex justify-between text-lg mb-6">

                            <span>Total</span>

                            <span class="font-bold text-red-600 text-xl">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </span>

                        </div>

                        <button id="pay-button" class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg">
                            Checkout
                        </button>

                    </div>

                </div>

            </div>
        @else
            <div class="bg-white rounded-xl shadow-lg p-12 text-center">

                <h2 class="text-2xl font-bold mb-3">
                    Keranjang masih kosong
                </h2>

                <p class="text-gray-500 mb-6">
                    Yuk pilih diecast favoritmu terlebih dahulu.
                </p>

                <a href="{{ url('/produk') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg">

                    Belanja Sekarang

                </a>

            </div>

        @endif

    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}">
    </script>

    <script>
        document.getElementById('pay-button').addEventListener('click', function() {
            fetch("{{ url('/checkout') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(res => res.json())
                .then(data => {

                    snap.pay(data.snapToken, {

                        onSuccess: function(result) {
                            window.location.href = "{{ url('/payment/finish') }}";
                        },

                        onPending: function(result) {
                            window.location.href = "{{ url('/payment/unfinish') }}";
                        },

                        onError: function(result) {
                            window.location.href = "{{ url('/payment/error') }}";
                        }

                    });

                });
        });
    </script>

@endsection
