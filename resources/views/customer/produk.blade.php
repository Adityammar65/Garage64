@extends('template.customer')

@section('title', 'Home')

@section('content')

{{-- CATEGORY --}}
<section class="max-w-7xl mx-auto px-6 pt-6">

<div class="flex gap-3 overflow-x-auto pb-4">

@foreach(($categories ?? collect()) as $cat)

<a
href="/products?category={{ $cat->slug }}"
class="
shrink-0
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



{{-- PRODUCT --}}
<section class="max-w-7xl mx-auto px-6 py-8">

<div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

@forelse(($products ?? collect()) as $product)

<div
class="
bg-[#111]
rounded-2xl
overflow-hidden
border
border-white/5
hover:border-yellow-500/40
hover:-translate-y-1
hover:shadow-2xl
hover:shadow-yellow-500/10
transition
duration-300
group">




{{-- IMAGE --}}
<a
href="/products/{{ $product->id }}"
class="
block
aspect-[4/5]
overflow-hidden
bg-[#181818]">

<img
src="{{ $product->image_url ?? '/images/no-image.png' }}"
alt="{{ $product->name }}"
class="
w-full
h-full
object-cover
group-hover:scale-105
transition
duration-500">

</a>




{{-- CONTENT --}}
<div class="p-4">

<p
class="
text-xs
uppercase
tracking-widest
text-gray-500">

{{ $product->brand ?? '-' }}

</p>



<h3
class="
text-white
font-semibold
text-lg
mt-1">

{{ $product->name }}

</h3>



<div class="mt-2">

<span
class="
text-sm
text-gray-500">

{{ $product->category?->name }}

</span>

</div>



{{-- HARGA --}}
<p
class="
mt-4
text-yellow-500
text-2xl
font-bold">

Rp {{ number_format($product->price ?? 0,0,',','.') }}

</p>



{{-- BUTTON BELI --}}
<a
href="{{ auth()->check()
? '/checkout?product_id='.$product->id
: '/login' }}"

class="
mt-4
w-full
flex
justify-center
items-center
py-3
rounded-xl
bg-yellow-500
hover:bg-yellow-400
text-black
font-bold
transition">

+ Keranjang

</a>

</div>

</div>


@empty



{{-- DUMMY CARD --}}
@for($i=1;$i<=8;$i++)

<div
class="
bg-[#111]
rounded-2xl
overflow-hidden
border
border-white/5">

<div
class="
aspect-[4/5]
bg-[#181818]
flex
items-center
justify-center">

<i class="fas fa-car text-6xl text-gray-700"></i>

</div>

<div class="p-4">

<p
class="
text-xs
uppercase
text-gray-500">

DIECAST

</p>

<h3
class="
text-white
font-semibold
mt-1">

Produk Contoh {{ $i }}

</h3>

<p
class="
mt-4
text-yellow-500
text-2xl
font-bold">

Rp 150.000

</p>

<a
href="/login"
class="
mt-4
w-full
flex
justify-center
items-center
py-3
rounded-xl
bg-yellow-500
hover:bg-yellow-400
text-black
font-bold">

+ Keranjang

</a>

</div>

</div>

@endfor

@endforelse

</div>

</section>

@endsection