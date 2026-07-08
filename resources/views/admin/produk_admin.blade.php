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
                    @forelse ($produk as $prd)
                        <tr class="border-b hover:bg-gray-700 text-center">

                            <td class="px-6 py-4">
                                {{ $prd->kode_produk }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $prd->nama_produk }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $prd->brand }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $prd->skala }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $prd->kategori->nama_kategori ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                Rp{{ number_format($prd->harga, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $prd->stok }}
                            </td>

                            <td class="px-6 py-4">
                                @if ($prd->is_active)
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

                                    <a href="{{ url('/admin/produk/edit/' . $prd->id_produk) }}"
                                        class="inline-flex items-center rounded-md bg-green-500 px-2 py-2 hover:bg-green-600">
                                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M11 4.00023H6.8C5.11984 4.00023 4.27976 4.00023 3.63803 4.32721C3.07354 4.61483 2.6146 5.07377 2.32698 5.63826C2 6.27999 2 7.12007 2 8.80023V17.2002C2 18.8804 2 19.7205 2.32698 20.3622C2.6146 20.9267 3.07354 21.3856 3.63803 21.6732C4.27976 22.0002 5.11984 22.0002 6.8 22.0002H15.2C16.8802 22.0002 17.7202 22.0002 18.362 21.6732C18.9265 21.3856 19.3854 20.9267 19.673 20.3622C20 19.7205 20 18.8804 20 17.2002V13.0002M7.99997 16.0002H9.67452C10.1637 16.0002 10.4083 16.0002 10.6385 15.945C10.8425 15.896 11.0376 15.8152 11.2166 15.7055C11.4184 15.5818 11.5914 15.4089 11.9373 15.063L21.5 5.50023C22.3284 4.6718 22.3284 3.32865 21.5 2.50023C20.6716 1.6718 19.3284 1.6718 18.5 2.50022L8.93723 12.063C8.59133 12.4089 8.41838 12.5818 8.29469 12.7837C8.18504 12.9626 8.10423 13.1577 8.05523 13.3618C7.99997 13.5919 7.99997 13.8365 7.99997 14.3257V16.0002Z"
                                                    stroke="#fff" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </a>

                                    <form action="{{ url('/admin/produk/hapus/' . $prd->id_produk) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="inline-flex items-center rounded-md bg-red-500 px-2 py-2 hover:bg-red-600">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M10 11V17" stroke="#fff" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M14 11V17" stroke="#fff" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M4 7H20" stroke="#fff" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path
                                                        d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                                        stroke="#fff" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                        stroke="#fff" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
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
