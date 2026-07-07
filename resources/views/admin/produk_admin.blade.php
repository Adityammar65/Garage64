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
                        <th class="px-6 py-4">Kode Produk</th>
                        <th class="px-6 py-4">Nama Produk</th>
                        <th class="px-6 py-4">Brand</th>
                        <th class="px-6 py-4">Skala</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Stok</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($products as $product)
                        <tr class="border-b hover:bg-gray-700 text-center">

                            <td class="px-6 py-4">
                                {{ $product->kode_produk }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $product->nama_produk }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $product->brand }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $product->skala }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $product->kategori->nama_kategori ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                Rp{{ number_format($product->harga, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $product->stok }}
                            </td>

                            <td class="px-6 py-4">
                                @if ($product->is_active)
                                    <span class="rounded bg-green-600 px-2 py-1 text-xs">
                                        Aktif
                                    </span>
                                @else
                                    <span class="rounded bg-red-600 px-2 py-1 text-xs">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ url('/admin/produk/edit/' . $product->id_produk) }}"
                                        class="inline-flex items-center rounded-md bg-green-500 px-2 py-2 hover:bg-green-600">

                                        <!-- SVG Edit -->
                                    </a>

                                    <form action="{{ url('/admin/produk/hapus/' . $product->id_produk) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="inline-flex items-center rounded-md bg-red-500 px-2 py-2 hover:bg-red-600">

                                            <!-- SVG Delete -->

                                        </button>

                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="py-10 text-center text-gray-400">
                                Belum ada data produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
