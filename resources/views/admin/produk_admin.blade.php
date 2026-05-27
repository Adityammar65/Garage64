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
        <div class="w-full">
            <table class="table-auto text-white text-center w-full">
                <thead>
                    <tr>
                        <th>Song</th>
                        <th>Artist</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                        <td>Malcolm Lockyer</td>
                        <td>1961</td>
                    </tr>
                    <tr>
                        <td>Witchy Woman</td>
                        <td>The Eagles</td>
                        <td>1972</td>
                    </tr>
                    <tr>
                        <td>Shining Star</td>
                        <td>Earth, Wind, and Fire</td>
                        <td>1975</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
