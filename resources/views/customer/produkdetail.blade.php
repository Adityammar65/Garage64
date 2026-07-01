@extends('template.customer')

@section('title', 'Nissan GT-R R34')

@section('content')

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

<div class="grid lg:grid-cols-2 gap-10">

{{-- FOTO --}}
<div>

<div class="bg-[#111] rounded-2xl overflow-hidden border border-white/10">

<img
src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b"
alt="Nissan GT-R R34"
class="w-full h-[550px] object-cover">

</div>

</div>



{{-- DETAIL --}}
<div>

<p class="text-sm uppercase tracking-widest text-gray-500">

Hot Wheels

</p>


<h1 class="text-3xl font-bold text-white mt-2">

Nissan GT-R R34

</h1>


<p class="mt-3 text-gray-400">

Kategori :
JDM

</p>




<div class="mt-4">

<span
class="
px-3
py-1
rounded-full
bg-green-500
text-white
text-sm">

Stok tersedia

</span>

</div>




<p class="mt-8 text-4xl font-bold text-yellow-500">

Rp 149.000

</p>



<p class="mt-4 text-gray-300">

Skala :
1:64

</p>




<div class="mt-8">

<h3 class="text-white font-semibold mb-3">

Deskripsi

</h3>

<p class="text-gray-400 leading-7">

Diecast premium Nissan GT-R R34 dengan detail tinggi,
material metal berkualitas dan cocok untuk koleksi.

</p>

</div>




{{-- ACTION --}}
<div class="mt-10 flex gap-4">

<button
class="
flex-1
py-4
rounded-xl
bg-yellow-500
hover:bg-yellow-400
text-black
font-bold">

+ Keranjang

</button>



<a
href="/products"
class="
px-6
py-4
rounded-xl
border
border-white/10
text-white">

Kembali

</a>

</div>

</div>

</div>

</section>

@endsection