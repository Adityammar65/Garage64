@extends('template.customer')
@section('title', 'Home')
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
            animation: marquee 45s linear infinite;
            will-change: transform;
        }
    </style>

    <!-- Hero Section -->
    <section>
        <div class="flex justify-center overflow-hidden"
            style="background-image: url('{{ asset('images/banner_hero.png') }}'); background-size: contain; background-position: center; background-repeat: no-repeat;">

            <!-- Content -->
            <div
                class="flex justify-center w-full h-full z-10 px-6 sm:px-12 py-24 md:py-32 flex flex-col justify-center items-center text-center bg-black/45">
                <h1 class="text-6xl italic font-bold font-archivo text-white mb-4 leading-tight">
                    @yield('hero_title', 'Premium Diecast Models')
                </h1>

                <p class="text-2xl text-white font-medium font-archivo italic mb-8 max-w-2xl">
                    @yield('hero_subtitle', 'Discover an exclusive collection of rare and authentic diecast vehicles. Perfect for collectors and enthusiasts.')
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#"
                        class="bg-transparent border-2 border-white text-white font-archivo px-8 py-3 rounded-lg hover:bg-white hover:text-red-600 transition">
                        <i class="fas fa-info-circle"></i>
                        Shop Now
                    </a>
                    <a href="#"
                        class="bg-transparent border-2 border-white text-white font-archivo px-8 py-3 rounded-lg hover:bg-white hover:text-red-600 transition">
                        <i class="fas fa-info-circle"></i>
                        Learn More
                    </a>
                </div>

                <!-- Trust Badges -->
                <div class="mt-12 flex flex-col sm:flex-row gap-8 justify-center text-white">
                    <div class="flex items-center gap-2">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21.007 8.27C22.194 9.125 23 10.45 23 12c0 1.55-.806 2.876-1.993 3.73.24 1.442-.134 2.958-1.227 4.05-1.095 1.095-2.61 1.459-4.046 1.225C14.883 22.196 13.546 23 12 23c-1.55 0-2.878-.807-3.731-1.996-1.438.235-2.954-.128-4.05-1.224-1.095-1.095-1.459-2.611-1.217-4.05C1.816 14.877 1 13.551 1 12s.816-2.878 2.002-3.73c-.242-1.439.122-2.955 1.218-4.05 1.093-1.094 2.61-1.467 4.057-1.227C9.125 1.804 10.453 1 12 1c1.545 0 2.88.803 3.732 1.993 1.442-.24 2.956.135 4.048 1.227 1.093 1.092 1.468 2.608 1.227 4.05Zm-4.426-.084a1 1 0 0 1 .233 1.395l-5 7a1 1 0 0 1-1.521.126l-3-3a1 1 0 0 1 1.414-1.414l2.165 2.165 4.314-6.04a1 1 0 0 1 1.395-.232Z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                        <span class="text-sm font-archivo">100% Authentic</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg width="20px" height="20px" viewBox="-2 0 20 20" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>lightning [#1262]</title>
                                <desc>Created with Sketch.</desc>
                                <defs> </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Dribbble-Light-Preview" transform="translate(-62.000000, -2559.000000)"
                                        fill="#fff">
                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                            <polygon id="lightning-[#1262]"
                                                points="14 2419 14 2411 6 2411 14 2399 14 2407 22 2407"> </polygon>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span class="text-sm font-archivo">Fast Shipping</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            id="secure" class="icon glyph" fill="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M19.42,3.83,12.24,2h0A.67.67,0,0,0,12,2a.67.67,0,0,0-.2,0h0L4.58,3.83A2,2,0,0,0,3.07,5.92l.42,5.51a12,12,0,0,0,7.24,10.11l.88.38h0a.91.91,0,0,0,.7,0h0l.88-.38a12,12,0,0,0,7.24-10.11l.42-5.51A2,2,0,0,0,19.42,3.83ZM15.71,9.71l-4,4a1,1,0,0,1-1.42,0l-2-2a1,1,0,0,1,1.42-1.42L11,11.59l3.29-3.3a1,1,0,0,1,1.42,1.42Z"
                                    style="fill:#fff"></path>
                            </g>
                        </svg>
                        <span class="text-sm font-archivo">Secure Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#000" fill-opacity="0.45"
            d="M0,0L40,21.3C80,43,160,85,240,90.7C320,96,400,64,480,53.3C560,43,640,53,720,64C800,75,880,85,960,106.7C1040,128,1120,160,1200,154.7C1280,149,1360,107,1400,85.3L1440,64L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
        </path>
    </svg>

    <!-- Stats Section -->
    <section class="my-5 mx-7">
        <h2 class="text-5xl font-archivo italic text-gray-900 mb-8 text-center">
            @yield('stats_title', 'Kenapa Memilih Kami?')
        </h2>
        <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto font-archivo">
            Garage64 hadir untuk para pecinta diecast yang mencari koleksi berkualitas, original, dan terpercaya. Kami
            memahami bahwa setiap diecast bukan sekadar miniatur, tetapi bagian dari passion dan koleksi berharga para
            enthusiast otomotif.
            <br></br>
            Dengan pilihan produk yang terus diperbarui, packaging aman untuk kolektor, serta pelayanan yang responsif, kami
            berkomitmen memberikan pengalaman belanja yang nyaman dan menyenangkan bagi setiap customer.
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Stat 1 -->
            <div class="bg-white rounded-lg shadow p-6 text-center hover:shadow-lg transition">
                <div class="text-4xl font-bold text-red-500 mb-2">@yield('stat1_number', '5000+')</div>
                <p class="text-gray-600 font-semibold">@yield('stat1_label', 'Products')</p>
                <p class="text-gray-500 text-sm mt-2">@yield('stat1_desc', 'Premium diecast models')</p>
            </div>

            <!-- Stat 2 -->
            <div class="bg-white rounded-lg shadow p-6 text-center hover:shadow-lg transition">
                <div class="text-4xl font-bold text-red-500 mb-2">@yield('stat2_number', '50K+')</div>
                <p class="text-gray-600 font-semibold">@yield('stat2_label', 'Happy Customers')</p>
                <p class="text-gray-500 text-sm mt-2">@yield('stat2_desc', 'Worldwide collectors')</p>
            </div>

            <!-- Stat 3 -->
            <div class="bg-white rounded-lg shadow p-6 text-center hover:shadow-lg transition">
                <div class="text-4xl font-bold text-red-500 mb-2">@yield('stat3_number', '100%')</div>
                <p class="text-gray-600 font-semibold">@yield('stat3_label', 'Authentic')</p>
                <p class="text-gray-500 text-sm mt-2">@yield('stat3_desc', 'Guaranteed genuine')</p>
            </div>

            <!-- Stat 4 -->
            <div class="bg-white rounded-lg shadow p-6 text-center hover:shadow-lg transition">
                <div class="text-4xl font-bold text-red-500 mb-2">@yield('stat4_number', '24/7')</div>
                <p class="text-gray-600 font-semibold">@yield('stat4_label', 'Support')</p>
                <p class="text-gray-500 text-sm mt-2">@yield('stat4_desc', 'Customer assistance')</p>
            </div>
        </div>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="oklch(63.7% 0.237 25.331)"
            d="M0,256L40,218.7C80,181,160,107,240,106.7C320,107,400,181,480,186.7C560,192,640,128,720,101.3C800,75,880,85,960,85.3C1040,85,1120,75,1200,106.7C1280,139,1360,213,1400,250.7L1440,288L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
        </path>
    </svg>

    <!-- Categories Section -->
    <section class="py-12 px-7 bg-red-500">
        <h2 class="text-5xl font-archivo text-white mb-8 text-center italic underline">
            @yield('categories_title', 'Shop by Category')
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Category Card 1 -->
            <a href="#" class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition h-64"
                style="background-image: url('{{ asset('images/preview_sport.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <div class="relative h-full flex flex-col justify-end p-6 bg-black/30 group-hover:bg-black/15 transition">
                    <h3 class="text-2xl font-archivo text-white mb-2">
                        <i class="fas fa-car mr-2"></i>
                        Sports Car
                    </h3>
                    <p class="text-white font-archivo italic text-sm">@yield('sports_desc', 'Model sport berperforma tinggi dengan desain agresif dan detail autentik')</p>
                </div>
            </a>

            <!-- Category Card 2 -->
            <a href="#" class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition h-64"
                style="background-image: url('{{ asset('images/preview_vintage.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <div class="relative h-full flex flex-col justify-end p-6 bg-black/30 group-hover:bg-black/15 transition">
                    <h3 class="text-2xl font-archivo text-white mb-2">
                        <i class="fas fa-history mr-2"></i>
                        Vintage Classics
                    </h3>
                    <p class="text-white font-archivo italic text-sm">@yield('vintage_desc', 'Mobil klasik yang timeless dan penuh nostalgia')</p>
                </div>
            </a>

            <!-- Category Card 3 -->
            <a href="#" class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition h-64"
                style="background-image: url('{{ asset('images/preview_trucks.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <div class="relative h-full flex flex-col justify-end p-6 bg-black/30 group-hover:bg-black/15 transition">
                    <h3 class="text-2xl font-archivo text-white mb-2">
                        <i class="fas fa-truck mr-2"></i>
                        Truck & SUV
                    </h3>
                    <p class="text-white font-archivo italic text-sm">@yield('trucks_desc', 'SUV dan truck dengan tampilan tangguh dan powerful')</p>
                </div>
            </a>
        </div>
        <p class="text-white text-2xl text-center mt-8 max-w-2xl mx-auto font-archivo italic">
            Temukan berbagai kategori diecast pilihan yang dirancang untuk memenuhi selera setiap kolektor. Mulai dari mobil
            balap modern, klasik legendaris, hingga SUV dan truck dengan detail autentik, Garage64 menghadirkan koleksi
            terbaik untuk melengkapi display impianmu.
        </p>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="oklch(63.7% 0.237 25.331)"
            d="M0,256L40,250.7C80,245,160,235,240,202.7C320,171,400,117,480,101.3C560,85,640,107,720,122.7C800,139,880,149,960,176C1040,203,1120,245,1200,250.7C1280,256,1360,224,1400,208L1440,192L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
        </path>
    </svg>

    <!-- Featured Products Section -->
    <section class="mb-12 mx-7 py-12">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-5xl font-archivo italic underline text-gray-900">
                @yield('featured_title', 'Produk Unggulan')
            </h2>
            <a href="#" class="flex items-center text-red-500 hover:text-red-600 transition font-semibold">
                <span class="mr-2 italic text-xs">Lihat Semua</span>
                <svg width="15px" height="15px" viewBox="0 -4.5 20 20" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <title>arrow_right [#346]</title>
                        <desc>Created with Sketch.</desc>
                        <defs> </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -6643.000000)"
                                fill="#ff0000">
                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                    <polygon id="arrow_right-[#346]"
                                        points="264 6488.26683 258.343 6483 256.929 6484.21678 260.172 6487.2264 244 6487.2264 244 6489.18481 260.172 6489.18481 256.929 6492.53046 258.343 6494">
                                    </polygon>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
        </div>

        <!-- Marquee Container -->
        <div class="w-full gap-6">
            <div class="overflow-hidden bg-gray-50">
                <div class="flex w-max animate-marquee">
                    @php
                        $items = [
                            [
                                'title' => 'Porsche 963 #7',
                                'description' =>
                                    'Porsche 963 #7 Porsche Penske Motorsport 2025 IMSA Daytona 24 Hrs Winner',
                                'image' => asset('products/showcases/MGT-Penske.png'),
                            ],
                            [
                                'title' => 'Land Rover Defender 110',
                                'description' =>
                                    '1/64 Land Rover Defender 110 Brown Metallic - MIJO Special Edition - Tarmac Works GLOBAL64',
                                'image' => asset('products/showcases/Tarmac-LandRover.png'),
                            ],
                            [
                                'title' => 'Toyota Tundra Black',
                                'description' => 'Colourful Model 1/64 Toyota Tundra Black',
                                'image' => asset('products/showcases/cm-toyota.png'),
                            ],
                            [
                                'title' => 'Porsche 911 GT3 R (992) #77',
                                'description' =>
                                    'Porsche 911 GT3 R (992) #77 AO Racing 2025 IMSA Sebring 12 Hrs Class Winner',
                                'image' => asset('products/showcases/MGT-Rexy.png'),
                            ],
                            [
                                'title' => 'Nissan SILVIA (S15)',
                                'description' => 'Nissan SILVIA (S15) LB-Super Silhouette AMOCULTURE',
                                'image' => asset('products/showcases/MGT-LB-S15.png'),
                            ],
                            [
                                'title' => 'Nissan Fairlady Z S30',
                                'description' =>
                                    '1/64 Nissan Fairlady Z S30 Widebody Blue - Designed by Jon Sibal - Tarmac Works GLOBAL64',
                                'image' => asset('products/showcases/Tarmac-Fairlady.png'),
                            ],
                            [
                                'title' => 'Mercedes-AMG F1',
                                'description' =>
                                    '1/64 Mercedes-AMG F1 W14 E Performance Italian Grand Prix 2023 #63 George Russell - Tarmac Works GLOBAL64',
                                'image' => asset('products/showcases/Tarmac-F1.png'),
                            ],
                            [
                                'title' => 'MAZDA 787B No.18',
                                'description' => 'MAZDA 787B No.18 59th 24 Hours Le Mans 1991',
                                'image' => asset('products/showcases/inno64-787b.png'),
                            ],
                        ];
                    @endphp
                    @foreach ($items as $item)
                        <div class="flex-shrink-0">
                            <div class="border border-gray-200 rounded-lg mx-2 w-100 h-65 shadow-sm"
                                style="background-image: url('{{ $item['image'] }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                <div class="wrapper bg-black/35 h-full p-2 rounded flex flex-col justify-end">
                                    <h3 class="font-archivo text-white">{{ $item['title'] }}</h3>
                                    <p class="text-xs font-archivo italic text-white">{{ $item['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($items as $item)
                        <div class="flex-shrink-0">
                            <div class="border border-gray-200 rounded-lg mx-2 w-100 h-65 shadow-sm"
                                style="background-image: url('{{ $item['image'] }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                <div class="wrapper bg-black/35 h-full p-2 rounded flex flex-col justify-end">
                                    <h3 class="font-archivo text-white">{{ $item['title'] }}</h3>
                                    <p class="text-xs font-archivo italic text-white">{{ $item['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <p class="text-right text-2xl text-black font-archivo italic my-22">
            Jelajahi koleksi unggulan pilihan yang paling diminati oleh para collector. Setiap model dipilih berdasarkan
            kualitas detail, popularitas, dan keunikan desain untuk memberikan pengalaman koleksi terbaik bagi para pecinta
            otomotif miniature.
        </p>
        <p class="text-center text-black/70 font-archivo italic my-10">
            <a href="#" class="hover:text-red-500 hover:underline flex items-center gap-2 justify-center">
                Kembali ke atas
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path opacity="0.4"
                            d="M15.4807 10.7702L11.6907 15.8202H6.08072C5.12072 15.8202 4.64073 14.6602 5.32073 13.9802L10.5007 8.80023C11.3307 7.97023 12.6807 7.97023 13.5107 8.80023L15.4807 10.7702Z"
                            fill="#ff0000"></path>
                        <path
                            d="M17.9195 15.82H11.6895L15.4795 10.77L18.6895 13.98C19.3595 14.66 18.8795 15.82 17.9195 15.82Z"
                            fill="#ff0000"></path>
                    </g>
                </svg>
            </a>
        </p>
    </section>

    <!-- Call to Action Section -->
    <section class="shadow-lg overflow-hidden"
        style="background-image: url('{{ asset('images/banner_community.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="relative px-6 py-16 bg-black/60">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

                <!-- Left Content -->
                <div class="text-white">
                    <h2 class="text-4xl font-archivo italic mb-4">
                        @yield('cta_title', 'Gabung dengan Komunitas Kolektor Kami!')
                    </h2>
                    <p class="text-gray-300 mb-6 font-archivo">
                        @yield('cta_description', 'Mengapa bergabung dalam komunitas kami?')
                    </p>
                    <ul class="space-y-3 mb-8 font-archivo">
                        <li class="flex items-center gap-3">
                            <svg height="20px" width="20px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 512 512" xml:space="preserve" fill="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path style="fill:#DB2B42;"
                                        d="M256,0C114.608,0,0,114.608,0,256c0,141.376,114.608,256,256,256s256-114.624,256-256 C512,114.624,397.376,0,256,0z">
                                    </path>
                                    <g style="opacity:0.2;">
                                        <polygon
                                            points="288.176,127.088 430.336,271.168 288.176,415.248 151.76,415.248 294.16,271.168 151.76,127.088 ">
                                        </polygon>
                                    </g>
                                    <polygon style="fill:#FFFFFF;"
                                        points="272.176,111.088 414.336,255.168 272.176,399.248 135.76,399.248 278.16,255.168 135.76,111.088 ">
                                    </polygon>
                                </g>
                            </svg>
                            <span>Dapatkan informasi eksklusif diecast keluaran terbaru</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg height="20px" width="20px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 512 512" xml:space="preserve" fill="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path style="fill:#DB2B42;"
                                        d="M256,0C114.608,0,0,114.608,0,256c0,141.376,114.608,256,256,256s256-114.624,256-256 C512,114.624,397.376,0,256,0z">
                                    </path>
                                    <g style="opacity:0.2;">
                                        <polygon
                                            points="288.176,127.088 430.336,271.168 288.176,415.248 151.76,415.248 294.16,271.168 151.76,127.088 ">
                                        </polygon>
                                    </g>
                                    <polygon style="fill:#FFFFFF;"
                                        points="272.176,111.088 414.336,255.168 272.176,399.248 135.76,399.248 278.16,255.168 135.76,111.088 ">
                                    </polygon>
                                </g>
                            </svg>
                            <span>Dapatkan penawaran eksklusif untuk member</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg height="20px" width="20px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 512 512" xml:space="preserve" fill="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path style="fill:#DB2B42;"
                                        d="M256,0C114.608,0,0,114.608,0,256c0,141.376,114.608,256,256,256s256-114.624,256-256 C512,114.624,397.376,0,256,0z">
                                    </path>
                                    <g style="opacity:0.2;">
                                        <polygon
                                            points="288.176,127.088 430.336,271.168 288.176,415.248 151.76,415.248 294.16,271.168 151.76,127.088 ">
                                        </polygon>
                                    </g>
                                    <polygon style="fill:#FFFFFF;"
                                        points="272.176,111.088 414.336,255.168 272.176,399.248 135.76,399.248 278.16,255.168 135.76,111.088 ">
                                    </polygon>
                                </g>
                            </svg>
                            <span>Akses eksklusif ke produk premium</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg height="20px" width="20px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 512 512" xml:space="preserve" fill="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path style="fill:#DB2B42;"
                                        d="M256,0C114.608,0,0,114.608,0,256c0,141.376,114.608,256,256,256s256-114.624,256-256 C512,114.624,397.376,0,256,0z">
                                    </path>
                                    <g style="opacity:0.2;">
                                        <polygon
                                            points="288.176,127.088 430.336,271.168 288.176,415.248 151.76,415.248 294.16,271.168 151.76,127.088 ">
                                        </polygon>
                                    </g>
                                    <polygon style="fill:#FFFFFF;"
                                        points="272.176,111.088 414.336,255.168 272.176,399.248 135.76,399.248 278.16,255.168 135.76,111.088 ">
                                    </polygon>
                                </g>
                            </svg>
                            <span>Dan benefit lainnya</span>
                        </li>
                    </ul>
                    <h2 class="text-3xl font-archivo italic mb-4">
                        @yield('cta_title', 'Build Your Dream Collection with Garage64')
                    </h2>
                    <p class="text-gray-300 mb-6 font-archivo">
                        @yield('cta_description', 'Mulai perjalanan koleksimu hari ini dan jadilah bagian dari komunitas collector yang terus berkembang. Dari daily hunt sampai rare collectibles, semuanya ada di Garage64!')
                    </p>
                </div>

                <!-- Right Content -->
                <div class="bg-gray-700 rounded-lg p-8">
                    <form class="space-y-4">
                        <div>
                            <label for="email" class="block text-white font-archivo italic mb-2">Email</label>
                            <input type="email" id="email" placeholder="your@email.com"
                                class="w-full px-4 py-3 rounded bg-gray-600 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>
                        <div>
                            <label for="name" class="block text-white font-archivo italic mb-2">Username</label>
                            <input type="text" id="name" placeholder="John Doe"
                                class="w-full px-4 py-3 rounded bg-gray-600 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>
                        <button type="submit"
                            class="italic w-full bg-red-500 hover:bg-red-600 transition text-white font-bold py-3 rounded">
                            Gabung Sekarang
                        </button>
                        <p class="text-gray-400 text-sm text-center">Sudah Punya Akun?
                            <a href="{{ url('/login') }}" class="text-red-500 hover:underline">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
