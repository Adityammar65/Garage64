@extends('template.admin')
@section('title', 'Manajemen Produk')
@section('page_title', 'Produk')
@section('content')
    <div class="flex flex-col gap-6">
        <div class="flex flex-col gap-4 items-center justify-center">
            <div class="flex gap-4 items-center w-3/4 justify-center">

                <!-- Search Bar -->
                <div class="w-full max-w-md">
                    <form action="#" method="GET" class="flex gap-2">
                        <input type="text" name="query"
                            class="text-white text-sm flex-1 px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-red-500"
                            placeholder="Cari Produk..." value="{{ request('query') }}">
                        <button type="submit"
                            class="text-white text-sm px-6 py-2 bg-gray-600 text-white rounded-full hover:bg-gray-700 transition-colors">
                            Cari
                        </button>
                    </form>
                </div>

                <!-- CRUD Menu -->
                <a href="#"
                    class="inline-flex gap-1 items-center rounded-md bg-green-500 px-2 py-2 text-sm font-medium text-white hover:bg-green-600">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M4 12H20M12 4V20" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <span class="text-white">Tambah Produk</span>
                </a>
            </div>
        </div>

        <!-- Product List -->
        <div class="overflow-x-auto text-white">
            <table class="min-w-full text-left text-sm whitespace-nowrap">
                <thead class="uppercase tracking-wider border-b-2 dark:border-neutral-600">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                            ID-Produk
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Stok
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            MGT-001
                        </th>
                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>
                        <td class="px-6 py-4">Rp240.000</td>
                        <td class="px-6 py-4">30</td>
                    </tr>

                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            MGT-002
                        </th>
                        <td class="px-6 py-4">Porsche 911 GT3 R (992) #77</td>
                        <td class="px-6 py-4">Rp250.000</td>
                        <td class="px-6 py-4">25</td>
                    </tr>

                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            TMW-001
                        </th>
                        <td class="px-6 py-4">Nissan Fairlady Z S30</td>
                        <td class="px-6 py-4">Rp400.000</td>
                        <td class="px-6 py-4">30</td>
                    </tr>

                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            COM-001
                        </th>
                        <td class="px-6 py-4">Toyota Tundra Black</td>
                        <td class="px-6 py-4">Rp500.000</td>
                        <td class="px-6 py-4">5</td>
                    </tr>

                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            INO-001
                        </th>
                        <td class="px-6 py-4">MAZDA 787B No.18</td>
                        <td class="px-6 py-4">Rp50.000</td>
                        <td class="px-6 py-4">30</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
