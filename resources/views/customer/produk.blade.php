@extends('template.customer')

@section('title', 'Produk')

@section('content')

{{-- CATEGORY --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">

<div class="flex gap-3 overflow-x-auto pb-4">

<a
href="/products"
class="
px-5
py-2
rounded-full
bg-[#111]
border
border-white/10
text-gray-300
hover:text-yellow-400
transition">

Semua

</a>

@foreach(($categories ?? collect()) as $cat)

<a
href="/products?category={{ $cat->slug }}"
class="
px-5
py-2
rounded-full
bg-[#111]
border
border-white/10
text-gray-300
hover:text-yellow-400
hover:border-yellow-500
transition">

{{ $cat->name }}

</a>

@endforeach

</div>

</section>



{{-- PRODUCTS --}}
{{-- Products Section --}}
<section id="products" class="max-w-7xl mx-auto px-4 py-10">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">
            Produk Terbaru
        </h2>

        <a href="/products"
            class="text-red-500 hover:underline">
            Lihat Semua
        </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

        @forelse(($products ?? collect()) as $product)

        <div
            class="bg-white rounded-xl overflow-hidden shadow hover:shadow-xl transition">

            {{-- Gambar bisa dipencet --}}
            <a href="/products/{{ $product->id }}">

                <div class="aspect-square bg-gray-100">

                    <img
                        src="{{ $product->image_url }}"
                        alt="{{ $product->name }}"
                        class="w-full h-full object-cover hover:scale-105 transition">

                </div>

            </a>

            <div class="p-4">

                <p class="text-xs text-gray-500">
                    {{ $product->brand }}
                </p>

                {{-- Nama bisa dipencet --}}
                <a
                    href="/products/{{ $product->id }}"
                    class="block font-semibold hover:text-red-500">

                    {{ $product->name }}

                </a>

                <p class="text-red-500 font-bold mt-2">

                    Rp {{ number_format($product->price,0,',','.') }}

                </p>

                {{-- Tombol keranjang --}}
                <form action="/cart/add" method="POST">

                    @csrf

                    <input
                        type="hidden"
                        name="product_id"
                        value="{{ $product->id }}">

                    <input
                        type="hidden"
                        name="quantity"
                        value="1">

                    <button
                        type="submit"
                        class="mt-3 w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg duration-300 ease-in-out">

                        + Keranjang

                    </button>

                </form>

            </div>

        </div>

        @empty

        {{-- Contoh produk --}}
        @for($i=1;$i<=8;$i++)

        <div
            class="bg-white rounded-xl overflow-hidden shadow hover:shadow-xl transition">

            <a href="#">

                <div
                    class="aspect-square bg-gray-200 flex items-center justify-center">

                    <i class="fas fa-car text-6xl text-gray-400"></i>

                </div>

            </a>

            <div class="p-4">

                <p class="text-xs text-gray-500">
                    HOT WHEELS
                </p>

                <a
                    href="#"
                    class="block font-semibold">

                    Nissan GT-R R34 {{ $i }}

                </a>

                <p class="text-red-500 font-bold mt-2">

                    Rp 149.000

                </p>

                <button
                    class="mt-3 w-full bg-red-500 text-white py-2 rounded-lg">

                    + Keranjang

                </button>

            </div>

        </div>

        @endfor

        @endforelse

    </div>

</section>

@endsection