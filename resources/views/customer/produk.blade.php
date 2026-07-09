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
                                'id_produk' => 1,
                                'title' => 'Porsche 963 #7',
                                'description' =>
                                    'Porsche 963 #7 Porsche Penske Motorsport 2025 IMSA Daytona 24 Hrs Winner',
                                'image' => asset('assets/products/showcases/MGT-Penske.png'),
                                'price' => 250000,
                            ],
                            [
                                'id_produk' => 1,
                                'title' => 'Land Rover Defender 110',
                                'description' =>
                                    '1/64 Land Rover Defender 110 Brown Metallic - MIJO Special Edition - Tarmac Works GLOBAL64',
                                'image' => asset('assets/products/showcases/Tarmac-LandRover.png'),
                                'price' => 250000,
                            ],
                            [
                                'id_produk' => 1,
                                'title' => 'Toyota Tundra Black',
                                'description' => 'Colourful Model 1/64 Toyota Tundra Black',
                                'image' => asset('assets/products/showcases/cm-toyota.png'),
                                'price' => 250000,
                            ],
                            [
                                'id_produk' => 1,
                                'title' => 'Porsche 911 GT3 R (992) #77',
                                'description' =>
                                    'Porsche 911 GT3 R (992) #77 AO Racing 2025 IMSA Sebring 12 Hrs Class Winner',
                                'image' => asset('assets/products/showcases/MGT-Rexy.png'),
                                'price' => 550000,
                            ],
                            [
                                'id_produk' => 1,
                                'title' => 'Nissan SILVIA (S15)',
                                'description' => 'Nissan SILVIA (S15) LB-Super Silhouette AMOCULTURE',
                                'image' => asset('assets/products/showcases/MGT-LB-S15.png'),
                                'price' => 150000,
                            ],
                            [
                                'id_produk' => 1,
                                'title' => 'Nissan Fairlady Z S30',
                                'description' =>
                                    '1/64 Nissan Fairlady Z S30 Widebody Blue - Designed by Jon Sibal - Tarmac Works GLOBAL64',
                                'image' => asset('assets/products/showcases/Tarmac-Fairlady.png'),
                                'price' => 150000,
                            ],
                            [
                                'id_produk' => 1,
                                'title' => 'Mercedes-AMG F1',
                                'description' =>
                                    '1/64 Mercedes-AMG F1 W14 E Performance Italian Grand Prix 2023 #63 George Russell - Tarmac Works GLOBAL64',
                                'image' => asset('assets/products/showcases/Tarmac-F1.png'),
                                'price' => 550000,
                            ],
                            [
                                'id_produk' => 1,
                                'title' => 'MAZDA 787B No.18',
                                'description' => 'MAZDA 787B No.18 59th 24 Hours Le Mans 1991',
                                'image' => asset('assets/products/showcases/inno64-787b.png'),
                                'price' => 250000,
                            ],
                        ];
                    @endphp
                    @foreach ($items as $item)
                        <div class="max-w-sm w-80 h-[480px] rounded shadow-lg mx-2 my-4 bg-white flex flex-col">
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
                                    <a href="{{ route('produk.detail', $item['id_produk']) }}" class="group tooltip-parent bg-red-600 py-2 px-10 rounded text-white font-semibold">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g id="Warning / Info">
                                                    <path id="Vector"
                                                        d="M12 11V16M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21ZM12.0498 8V8.1L11.9502 8.1002V8H12.0498Z"
                                                        stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </g>
                                        </svg>

                                        <span class="tooltip">
                                            Lihat lebih detail
                                        </span>
                                    </a>
                                    <a href="#"
                                        class="group tooltip-parent bg-blue-600 hover:bg-blue-700 hover:scale-105 transition-all duration-200 py-2 px-10 rounded text-white font-semibold shadow hover:shadow-lg">
                                        <svg width="24px" height="24px" viewBox="0 -0.5 20 20" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            fill="#ffffff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title>shopping_cart_plus_round [#1130]</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs> </defs>
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <g id="Dribbble-Light-Preview"
                                                        transform="translate(-420.000000, -3120.000000)" fill="#ffffff">
                                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                                            <path
                                                                d="M371.000402,2972.95319 C371.000402,2972.39688 371.44825,2971.94539 372.000062,2971.94539 L372.999723,2971.94539 L372.999723,2970.57478 C372.999723,2970.01747 373.447571,2969.56698 373.999384,2969.56698 C374.551197,2969.56698 374.999045,2970.01747 374.999045,2970.57478 L374.999045,2971.94539 L375.998705,2971.94539 C376.550518,2971.94539 376.998366,2972.39688 376.998366,2972.95319 C376.998366,2973.5095 376.550518,2973.96099 375.998705,2973.96099 L374.999045,2973.96099 L374.999045,2974.60599 C374.999045,2975.16229 374.551197,2975.61379 373.999384,2975.61379 C373.447571,2975.61379 372.999723,2975.16229 372.999723,2974.60599 L372.999723,2973.96099 L372.000062,2973.96099 C371.44825,2973.96099 371.000402,2973.5095 371.000402,2972.95319 L371.000402,2972.95319 Z M379.457532,2976.16405 C379.367562,2976.63973 378.955702,2976.9844 378.474865,2976.9844 L369.541896,2976.9844 C369.054062,2976.9844 368.636204,2976.62864 368.556231,2976.14187 L367.362636,2968.92198 L380.81707,2968.92198 L379.457532,2976.16405 Z M382.996331,2966.90638 L380.997009,2966.90638 L377.475204,2960.57436 C377.198298,2960.09264 376.587506,2959.83665 376.108668,2960.11481 C375.63083,2960.39296 375.466886,2961.14579 375.743792,2961.62752 L378.688793,2966.90638 L369.309975,2966.90638 L372.254976,2961.58217 C372.531882,2961.10044 372.367938,2960.39296 371.8901,2960.11481 C371.411262,2959.83665 370.800469,2960.13799 370.523563,2960.61972 L367.001758,2966.90638 L365.002437,2966.90638 C363.791848,2966.90638 363.428971,2968.92198 365.335324,2968.92198 L366.722853,2977.31596 C366.883798,2978.28748 367.718515,2979 368.695184,2979 L379.303584,2979 C380.280253,2979 381.114969,2978.28748 381.275915,2977.31596 L382.663444,2968.92198 C384.58979,2968.92198 384.189926,2966.90638 382.996331,2966.90638 L382.996331,2966.90638 Z"
                                                                id="shopping_cart_plus_round-[#1130]"> </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>

                                        <span class="tooltip">
                                            Tambah ke Keranjang
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($items as $item)
                        <div class="max-w-sm w-80 h-[480px] rounded shadow-lg mx-2 my-4 bg-white flex flex-col">
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
                                    <a href="{{ route('produk.detail', $item['id_produk']) }}" class="group tooltip-parent bg-red-600 py-2 px-10 rounded text-white font-semibold">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g id="Warning / Info">
                                                    <path id="Vector"
                                                        d="M12 11V16M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21ZM12.0498 8V8.1L11.9502 8.1002V8H12.0498Z"
                                                        stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </g>
                                        </svg>

                                        <span class="tooltip">
                                            Lihat lebih detail
                                        </span>
                                    </a>
                                    <a href="#"
                                        class="group tooltip-parent bg-blue-600 hover:bg-blue-700 hover:scale-105 transition-all duration-200 py-2 px-10 rounded text-white font-semibold shadow hover:shadow-lg">
                                        <svg width="24px" height="24px" viewBox="0 -0.5 20 20" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            fill="#ffffff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title>shopping_cart_plus_round [#1130]</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs> </defs>
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <g id="Dribbble-Light-Preview"
                                                        transform="translate(-420.000000, -3120.000000)" fill="#ffffff">
                                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                                            <path
                                                                d="M371.000402,2972.95319 C371.000402,2972.39688 371.44825,2971.94539 372.000062,2971.94539 L372.999723,2971.94539 L372.999723,2970.57478 C372.999723,2970.01747 373.447571,2969.56698 373.999384,2969.56698 C374.551197,2969.56698 374.999045,2970.01747 374.999045,2970.57478 L374.999045,2971.94539 L375.998705,2971.94539 C376.550518,2971.94539 376.998366,2972.39688 376.998366,2972.95319 C376.998366,2973.5095 376.550518,2973.96099 375.998705,2973.96099 L374.999045,2973.96099 L374.999045,2974.60599 C374.999045,2975.16229 374.551197,2975.61379 373.999384,2975.61379 C373.447571,2975.61379 372.999723,2975.16229 372.999723,2974.60599 L372.999723,2973.96099 L372.000062,2973.96099 C371.44825,2973.96099 371.000402,2973.5095 371.000402,2972.95319 L371.000402,2972.95319 Z M379.457532,2976.16405 C379.367562,2976.63973 378.955702,2976.9844 378.474865,2976.9844 L369.541896,2976.9844 C369.054062,2976.9844 368.636204,2976.62864 368.556231,2976.14187 L367.362636,2968.92198 L380.81707,2968.92198 L379.457532,2976.16405 Z M382.996331,2966.90638 L380.997009,2966.90638 L377.475204,2960.57436 C377.198298,2960.09264 376.587506,2959.83665 376.108668,2960.11481 C375.63083,2960.39296 375.466886,2961.14579 375.743792,2961.62752 L378.688793,2966.90638 L369.309975,2966.90638 L372.254976,2961.58217 C372.531882,2961.10044 372.367938,2960.39296 371.8901,2960.11481 C371.411262,2959.83665 370.800469,2960.13799 370.523563,2960.61972 L367.001758,2966.90638 L365.002437,2966.90638 C363.791848,2966.90638 363.428971,2968.92198 365.335324,2968.92198 L366.722853,2977.31596 C366.883798,2978.28748 367.718515,2979 368.695184,2979 L379.303584,2979 C380.280253,2979 381.114969,2978.28748 381.275915,2977.31596 L382.663444,2968.92198 C384.58979,2968.92198 384.189926,2966.90638 382.996331,2966.90638 L382.996331,2966.90638 Z"
                                                                id="shopping_cart_plus_round-[#1130]"> </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>

                                        <span class="tooltip">
                                            Tambah ke Keranjang
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h1 class="text-2xl text-black font-archivo italic p-4">
                    Produk terbaru
                </h1>

                <div class="flex flex-wrap justify-around w-full">
                    @forelse ($produk as $prd)
                        <div class="max-w-sm w-80 h-[480px] rounded shadow-lg mx-2 my-4 bg-white flex flex-col">

                            <img class="w-full h-56 object-cover" src="{{ asset('storage/' . $prd->gambar) }}"
                                alt="{{ $prd->nama_produk }}">

                            <div class="px-6 py-4 flex-1 flex flex-col">
                                <div>
                                    <div class="font-bold text-xl mb-2">
                                        {{ $prd->nama_produk }}
                                    </div>

                                    <p class="text-gray-700 text-base h-16 overflow-hidden">
                                        {{ Str::limit($prd->deskripsi, 120) }}
                                    </p>

                                    <p class="text-gray-700 text-base mt-2 font-semibold">
                                        Rp {{ number_format($prd->harga, 0, ',', '.') }}
                                    </p>
                                </div>

                                <div class="mt-auto pt-4 flex justify-evenly">
                                    <a href="{{ url('/produk/detail'. $prd->id_produk) }}" class="group tooltip-parent bg-red-600 py-2 px-10 rounded text-white font-semibold">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 11V16M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21ZM12.0498 8V8.1L11.9502 8.1002V8H12.0498Z"
                                                stroke="#fff" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    
                                        <span class="tooltip">
                                            Lihat lebih detail
                                        </span>
                                    </a>
                                    <a href="{{ url('/produk/tambah-ke-keranjang/'. $prd->id_produk) }}" class="group tooltip-parent bg-blue-600 py-2 px-10 rounded text-white font-semibold"
                                        class="group tooltip-parent bg-blue-600 py-2 px-10 rounded text-white font-semibold">

                                        <!-- SVG tetap -->
                                        <svg width="24px" height="24px" viewBox="0 -0.5 20 20" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            fill="#ffffff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title>shopping_cart_plus_round [#1130]</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs> </defs>
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <g id="Dribbble-Light-Preview"
                                                        transform="translate(-420.000000, -3120.000000)" fill="#ffffff">
                                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                                            <path
                                                                d="M371.000402,2972.95319 C371.000402,2972.39688 371.44825,2971.94539 372.000062,2971.94539 L372.999723,2971.94539 L372.999723,2970.57478 C372.999723,2970.01747 373.447571,2969.56698 373.999384,2969.56698 C374.551197,2969.56698 374.999045,2970.01747 374.999045,2970.57478 L374.999045,2971.94539 L375.998705,2971.94539 C376.550518,2971.94539 376.998366,2972.39688 376.998366,2972.95319 C376.998366,2973.5095 376.550518,2973.96099 375.998705,2973.96099 L374.999045,2973.96099 L374.999045,2974.60599 C374.999045,2975.16229 374.551197,2975.61379 373.999384,2975.61379 C373.447571,2975.61379 372.999723,2975.16229 372.999723,2974.60599 L372.999723,2973.96099 L372.000062,2973.96099 C371.44825,2973.96099 371.000402,2973.5095 371.000402,2972.95319 L371.000402,2972.95319 Z M379.457532,2976.16405 C379.367562,2976.63973 378.955702,2976.9844 378.474865,2976.9844 L369.541896,2976.9844 C369.054062,2976.9844 368.636204,2976.62864 368.556231,2976.14187 L367.362636,2968.92198 L380.81707,2968.92198 L379.457532,2976.16405 Z M382.996331,2966.90638 L380.997009,2966.90638 L377.475204,2960.57436 C377.198298,2960.09264 376.587506,2959.83665 376.108668,2960.11481 C375.63083,2960.39296 375.466886,2961.14579 375.743792,2961.62752 L378.688793,2966.90638 L369.309975,2966.90638 L372.254976,2961.58217 C372.531882,2961.10044 372.367938,2960.39296 371.8901,2960.11481 C371.411262,2959.83665 370.800469,2960.13799 370.523563,2960.61972 L367.001758,2966.90638 L365.002437,2966.90638 C363.791848,2966.90638 363.428971,2968.92198 365.335324,2968.92198 L366.722853,2977.31596 C366.883798,2978.28748 367.718515,2979 368.695184,2979 L379.303584,2979 C380.280253,2979 381.114969,2978.28748 381.275915,2977.31596 L382.663444,2968.92198 C384.58979,2968.92198 384.189926,2966.90638 382.996331,2966.90638 L382.996331,2966.90638 Z"
                                                                id="shopping_cart_plus_round-[#1130]"> </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    
                                        <span class="tooltip">
                                            Tambah ke Keranjang
                                        </span>
                                    </a>

                                </div>
                            </div>

                        </div>
                    @empty
                        <div class="w-full py-16 text-center">
                            <h2 class="text-2xl font-semibold text-gray-500">
                                Belum ada produk.
                            </h2>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
