@extends('template.customer')

@section('title', 'Keranjang Belanja')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-bold text-gray-800 mb-8">
        🛒 Keranjang Belanja
    </h1>

    @if($keranjang->count())

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

                @foreach($keranjang as $item)

                @php
                    $total += $item->subtotal;
                @endphp

                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="p-4">

                        <div class="flex items-center gap-4">

                            @if($item->produk->gambar)
                                <img src="{{ asset('storage/'.$item->produk->gambar) }}"
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
                        Rp {{ number_format($item->produk->harga,0,',','.') }}
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

                        Rp {{ number_format($item->subtotal,0,',','.') }}

                    </td>

                    <td class="text-center">

                        <a href="/keranjang/hapus/{{ $item->id }}"
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

    <div class="mt-8 flex justify-end">

        <div class="bg-white rounded-xl shadow-lg p-6 w-full md:w-96">

            <h3 class="text-xl font-bold mb-4">
                Ringkasan Belanja
            </h3>

            <div class="flex justify-between text-lg mb-6">

                <span>Total</span>

                <span class="font-bold text-red-600">

                    Rp {{ number_format($total,0,',','.') }}

                </span>

            </div>

            <a href="#"
                class="block text-center bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg font-semibold">

                Checkout

            </a>

        </div>

    </div>

    @else

    <div class="bg-white rounded-xl shadow-lg p-12 text-center">

        <div class="text-7xl mb-5">
            🛒
        </div>

        <h2 class="text-2xl font-bold mb-3">
            Keranjang masih kosong
        </h2>

        <p class="text-gray-500 mb-6">
            Yuk pilih diecast favoritmu terlebih dahulu.
        </p>

        <a href="{{ url('/produk') }}"
            class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg">

            Belanja Sekarang

        </a>

    </div>

    @endif

</div>

@endsection