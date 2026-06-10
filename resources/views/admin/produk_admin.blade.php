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
                <a href="{{ url('/admin/produk/tambah') }}"
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
            <table class="min-w-full text-center text-sm whitespace-nowrap">
                <thead class="uppercase tracking-wider border-b-2">
                    <tr class="text-center">
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
                        <th scope="col" class="px-6 py-4">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="border-b hover:bg-gray-700">
                        <th scope="row" class="px-6 py-4">
                            MGT-001
                        </th>
                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>
                        <td class="px-6 py-4">Rp240.000</td>
                        <td class="px-6 py-4">30</td>
                        <td class="flex gap-2 justify-center px-6 py-4">
                            <a href="{{ url('/admin/produk/edit') }}"
                                class="inline-flex gap-1 items-center rounded-md bg-green-500 px-2 py-2 hover:bg-green-600">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M15 6.5L17.5 9M4 20V17.5L16.75 4.75C17.4404 4.05964 18.5596 4.05964 19.25 4.75V4.75C19.9404 5.44036 19.9404 6.55964 19.25 7.25L6.5 20H4Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                            <a href="#"
                                class="inline-flex gap-1 items-center rounded-md bg-red-500 px-2 py-2 hover:bg-red-600">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M10 11V17" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M14 11V17" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M4 7H20" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </a>
                        </td>
                    </tr>

                    <tr class="border-b hover:bg-gray-700">
                        <th scope="row" class="px-6 py-4">
                            MGT-002
                        </th>
                        <td class="px-6 py-4">Porsche 911 GT3 R (992) #77</td>
                        <td class="px-6 py-4">Rp250.000</td>
                        <td class="px-6 py-4">25</td>
                        <td class="flex gap-2 justify-center px-6 py-4">
                            <a href="#"
                                class="inline-flex gap-1 items-center rounded-md bg-green-500 px-2 py-2 hover:bg-green-600">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M15 6.5L17.5 9M4 20V17.5L16.75 4.75C17.4404 4.05964 18.5596 4.05964 19.25 4.75V4.75C19.9404 5.44036 19.9404 6.55964 19.25 7.25L6.5 20H4Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                            <a href="#"
                                class="inline-flex gap-1 items-center rounded-md bg-red-500 px-2 py-2 hover:bg-red-600">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M10 11V17" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M14 11V17" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M4 7H20" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </a>
                        </td>
                    </tr>

                    <tr class="border-b hover:bg-gray-700">
                        <th scope="row" class="px-6 py-4">
                            TMW-001
                        </th>
                        <td class="px-6 py-4">Nissan Fairlady Z S30</td>
                        <td class="px-6 py-4">Rp400.000</td>
                        <td class="px-6 py-4">30</td>
                        <td class="flex gap-2 justify-center px-6 py-4">
                            <a href="#"
                                class="inline-flex gap-1 items-center rounded-md bg-green-500 px-2 py-2 hover:bg-green-600">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M15 6.5L17.5 9M4 20V17.5L16.75 4.75C17.4404 4.05964 18.5596 4.05964 19.25 4.75V4.75C19.9404 5.44036 19.9404 6.55964 19.25 7.25L6.5 20H4Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                            <a href="#"
                                class="inline-flex gap-1 items-center rounded-md bg-red-500 px-2 py-2 hover:bg-red-600">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M10 11V17" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M14 11V17" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M4 7H20" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </a>
                        </td>
                    </tr>

                    <tr class="border-b hover:bg-gray-700">
                        <th scope="row" class="px-6 py-4">
                            COM-001
                        </th>
                        <td class="px-6 py-4">Toyota Tundra Black</td>
                        <td class="px-6 py-4">Rp500.000</td>
                        <td class="px-6 py-4">5</td>
                        <td class="flex gap-2 justify-center px-6 py-4">
                            <a href="#"
                                class="inline-flex gap-1 items-center rounded-md bg-green-500 px-2 py-2 hover:bg-green-600">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M15 6.5L17.5 9M4 20V17.5L16.75 4.75C17.4404 4.05964 18.5596 4.05964 19.25 4.75V4.75C19.9404 5.44036 19.9404 6.55964 19.25 7.25L6.5 20H4Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                            <a href="#"
                                class="inline-flex gap-1 items-center rounded-md bg-red-500 px-2 py-2 hover:bg-red-600">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M10 11V17" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M14 11V17" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M4 7H20" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </a>
                        </td>
                    </tr>

                    <tr class="border-b hover:bg-gray-700">
                        <th scope="row" class="px-6 py-4">
                            INO-001
                        </th>
                        <td class="px-6 py-4">MAZDA 787B No.18</td>
                        <td class="px-6 py-4">Rp50.000</td>
                        <td class="px-6 py-4">30</td>
                        <td class="flex gap-2 justify-center px-6 py-4">
                            <a href="#"
                                class="inline-flex gap-1 items-center rounded-md bg-green-500 px-2 py-2 hover:bg-green-600">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M15 6.5L17.5 9M4 20V17.5L16.75 4.75C17.4404 4.05964 18.5596 4.05964 19.25 4.75V4.75C19.9404 5.44036 19.9404 6.55964 19.25 7.25L6.5 20H4Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                            <a href="#"
                                class="inline-flex gap-1 items-center rounded-md bg-red-500 px-2 py-2 hover:bg-red-600">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M10 11V17" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M14 11V17" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M4 7H20" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
