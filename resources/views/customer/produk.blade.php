@extends('template.customer')
@section('title', 'Produk')
@section('content')
    <style>
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-marquee {
            width: max-content;
            animation: marquee 100s linear infinite;
            will-change: transform;
        }
    </style>

    <div class="p-6">
        <div class="w-full gap-6">
            <h1 class="text-2xl text-black font-archivo italic p-4">Produk Unggulan</h1>
            <div class="overflow-hidden bg-gray-50">
                <div class="flex w-max animate-marquee">
                    @php
                        $items = [
                            [
                                'title' => 'Porsche 963 #7',
                                'description' =>
                                    'Porsche 963 #7 Porsche Penske Motorsport 2025 IMSA Daytona 24 Hrs Winner',
                                'image' => asset('products/showcases/MGT-Penske.png'),
                                'price' => 250000,
                            ],
                            [
                                'title' => 'Land Rover Defender 110',
                                'description' =>
                                    '1/64 Land Rover Defender 110 Brown Metallic - MIJO Special Edition - Tarmac Works GLOBAL64',
                                'image' => asset('products/showcases/Tarmac-LandRover.png'),
                                'price' => 250000,
                            ],
                            [
                                'title' => 'Toyota Tundra Black',
                                'description' => 'Colourful Model 1/64 Toyota Tundra Black',
                                'image' => asset('products/showcases/cm-toyota.png'),
                                'price' => 250000,
                            ],
                            [
                                'title' => 'Porsche 911 GT3 R (992) #77',
                                'description' =>
                                    'Porsche 911 GT3 R (992) #77 AO Racing 2025 IMSA Sebring 12 Hrs Class Winner',
                                'image' => asset('products/showcases/MGT-Rexy.png'),
                                'price' => 550000,
                            ],
                            [
                                'title' => 'Nissan SILVIA (S15)',
                                'description' => 'Nissan SILVIA (S15) LB-Super Silhouette AMOCULTURE',
                                'image' => asset('products/showcases/MGT-LB-S15.png'),
                                'price' => 150000,
                            ],
                            [
                                'title' => 'Nissan Fairlady Z S30',
                                'description' =>
                                    '1/64 Nissan Fairlady Z S30 Widebody Blue - Designed by Jon Sibal - Tarmac Works GLOBAL64',
                                'image' => asset('products/showcases/Tarmac-Fairlady.png'),
                                'price' => 150000,
                            ],
                            [
                                'title' => 'Mercedes-AMG F1',
                                'description' =>
                                    '1/64 Mercedes-AMG F1 W14 E Performance Italian Grand Prix 2023 #63 George Russell - Tarmac Works GLOBAL64',
                                'image' => asset('products/showcases/Tarmac-F1.png'),
                                'price' => 550000,
                            ],
                            [
                                'title' => 'MAZDA 787B No.18',
                                'description' => 'MAZDA 787B No.18 59th 24 Hours Le Mans 1991',
                                'image' => asset('products/showcases/inno64-787b.png'),
                                'price' => 250000,
                            ],
                        ];
                    @endphp
                    @foreach ($items as $item)
                        <div
                            class="max-w-sm w-80 h-[480px] rounded overflow-hidden shadow-lg mx-2 my-4 bg-white flex flex-col">
                            <img class="w-full h-56 object-cover" src="{{ $item['image'] }}">
                            <div class="px-6 py-4 flex-1 flex flex-col">
                                <div>
                                    <div class="font-bold text-xl mb-2">
                                        {{ $item['title'] }}
                                    </div>
                                    <p class="text-gray-700 text-base h-16 overflow-hidden">
                                        {{ $item['description'] }}
                                    </p>
                                    <p class="text-gray-700 text-base mt-2 font-semibold">
                                        Rp {{ number_format($item['price'], 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="mt-auto pt-4 flex justify-evenly">
                                    <a href="#" class="text-red-600">Beli</a>
                                    <a href="#" class="text-blue-600">Tambah Ke Keranjang</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($items as $item)
                        <div
                            class="max-w-sm w-80 h-[480px] rounded overflow-hidden shadow-lg mx-2 my-4 bg-white flex flex-col">
                            <img class="w-full h-56 object-cover" src="{{ $item['image'] }}">
                            <div class="px-6 py-4 flex-1 flex flex-col">
                                <div>
                                    <div class="font-bold text-xl mb-2">
                                        {{ $item['title'] }}
                                    </div>
                                    <p class="text-gray-700 text-base h-16 overflow-hidden">
                                        {{ $item['description'] }}
                                    </p>
                                    <p class="text-gray-700 text-base mt-2 font-semibold">
                                        Rp {{ number_format($item['price'], 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="mt-auto pt-4 flex justify-evenly">
                                    <a href="#" class="text-red-600">Beli</a>
                                    <a href="#" class="text-blue-600">Tambah Ke Keranjang</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h1 class="text-2xl text-black font-archivo italic p-4">Produk terbaru</h1>
                <div class="flex flex-wrap justify-center w-full">
                    @foreach ($items as $item)
                        <div
                            class="max-w-sm w-80 h-[480px] rounded overflow-hidden shadow-lg mx-2 my-4 bg-white flex flex-col">
                            <img class="w-full h-56 object-cover" src="{{ $item['image'] }}">
                            <div class="px-6 py-4 flex-1 flex flex-col">
                                <div>
                                    <div class="font-bold text-xl mb-2">
                                        {{ $item['title'] }}
                                    </div>
                                    <p class="text-gray-700 text-base h-16 overflow-hidden">
                                        {{ $item['description'] }}
                                    </p>
                                    <p class="text-gray-700 text-base mt-2 font-semibold">
                                        Rp {{ number_format($item['price'], 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="mt-auto pt-4 flex justify-evenly">
                                    <a href="#" class="text-red-600">Beli</a>
                                    <a href="#" class="text-blue-600">Tambah Ke Keranjang</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($items as $item)
                        <div
                            class="max-w-sm w-80 h-[480px] rounded overflow-hidden shadow-lg mx-2 my-4 bg-white flex flex-col">
                            <img class="w-full h-56 object-cover" src="{{ $item['image'] }}">
                            <div class="px-6 py-4 flex-1 flex flex-col">
                                <div>
                                    <div class="font-bold text-xl mb-2">
                                        {{ $item['title'] }}
                                    </div>
                                    <p class="text-gray-700 text-base h-16 overflow-hidden">
                                        {{ $item['description'] }}
                                    </p>
                                    <p class="text-gray-700 text-base mt-2 font-semibold">
                                        Rp {{ number_format($item['price'], 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="mt-auto pt-4 flex justify-evenly">
                                    <a href="#" class="text-red-600">Beli</a>
                                    <a href="#" class="text-blue-600">Tambah Ke Keranjang</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
