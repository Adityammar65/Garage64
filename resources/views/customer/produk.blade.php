@extends('template.customer')
@section('title', 'Pesanan Saya')
@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6 relative z-20">
    <div class="category-chips flex items-center gap-3 overflow-x-auto pb-2">

        

        @foreach(($categories ?? collect()) as $cat)
            <a href="/products?category={{ $cat->slug }}"
               class="flex-shrink-0 px-5 py-2.5 bg-[var(--bg-surface)] border border-[var(--border-subtle)] text-sm font-medium text-[var(--text-secondary)] rounded-full">
                {{ $cat->name }}
            </a>
        @endforeach

    </div>
</section>


{{-- Products --}}
<section id="products" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

<div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4">

@forelse(($products ?? collect()) as $product)

<div class="product-card">

<img src="{{ $product->image_url ?? '/images/no-image.png' }}"
alt="{{ $product->name ?? 'Produk' }}">

<p>{{ $product->brand ?? '-' }}</p>

<p>{{ $product->name ?? '-' }}</p>

<p>
Rp {{ number_format($product->price ?? 0,0,',','.') }}
</p>

</div>

@empty

{{-- Dummy Cards --}}
@for($i = 1; $i <= 8; $i++)
<div class="product-card bg-[var(--bg-surface)] border border-[var(--border-subtle)] rounded-xl overflow-hidden">

    <div class="aspect-square bg-[#181818] flex items-center justify-center">
        <i class="fas fa-car text-5xl text-gray-600"></i>
    </div>

    <div class="p-4">

        <p class="text-xs text-[var(--chrome)] uppercase">
            DIECAST
        </p>

        <h3 class="text-white font-semibold mt-1">
            Produk Contoh {{ $i }}
        </h3>

        <div class="flex items-center gap-2 mt-2">
            <span class="w-2 h-2 rounded-full bg-[var(--success)]"></span>
            <span class="text-xs text-[var(--text-muted)]">
                Stok tersedia
            </span>
        </div>

        <p class="text-[var(--gold-primary)] font-bold mt-3">
            Rp 150.000
        </p>

        <button
            class="w-full mt-3 py-2 rounded-lg bg-[var(--gold-primary)] text-black font-semibold">

            + Keranjang

        </button>

    </div>

</div>
@endfor

@endforelse
@endsection