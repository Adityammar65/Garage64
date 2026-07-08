@extends('template.admin')
@section('title', 'Laporan')
@section('page_title', 'Laporan')
@section('content')
```blade
@section('content')
<div class="flex flex-col gap-6 p-4">

    <!-- Sales Report -->
    <div class="w-full bg-gray-800 rounded-xl shadow-xl overflow-hidden border border-gray-700">

        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-700">
            <h2 class="text-white font-bold text-xl">
                Laporan Penjualan
            </h2>

            <span class="text-xs text-white/60">
                Data Produk Terjual
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-center text-sm text-white">

                <thead class="uppercase tracking-wider bg-gray-700/50">
                    <tr>
                        <th class="px-6 py-4">ID Produk</th>
                        <th class="px-6 py-4">Nama Produk</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Stok</th>
                    </tr>
                </thead>

                <tbody>
                    @for($i = 0; $i < 5; $i++)
                    <tr class="border-b border-gray-700 hover:bg-gray-700/40 transition">

                        <th class="px-6 py-4 font-medium">
                            MGT-001
                        </th>

                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>

                        <td class="px-6 py-4">
                            Rp240.000
                        </td>

                        <td class="px-6 py-4">
                            30
                        </td>

                    </tr>
                    @endfor
                </tbody>

            </table>
        </div>

        <div class="px-6 py-4 text-right">
            <a href="#"
                class="text-white/60 text-sm hover:underline transition">
                Unduh Laporan →
            </a>
        </div>

    </div>


    <!-- Revenue Report -->
    <div class="w-full bg-gray-800 rounded-xl shadow-xl overflow-hidden border border-gray-700">

        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-700">
            <h2 class="text-white font-bold text-xl">
                Laporan Keuangan
            </h2>

            <span class="text-xs text-white/60">
                Rekap Pendapatan
            </span>
        </div>


        <div class="overflow-x-auto">

            <table class="min-w-full text-center text-sm text-white">

                <thead class="uppercase tracking-wider bg-gray-700/50">

                    <tr>
                        <th class="px-6 py-4">ID Produk</th>
                        <th class="px-6 py-4">Nama Produk</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Stok</th>
                    </tr>

                </thead>


                <tbody>

                    @for($i = 0; $i < 5; $i++)

                    <tr class="border-b border-gray-700 hover:bg-gray-700/40 transition">

                        <th class="px-6 py-4 font-medium">
                            MGT-001
                        </th>

                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>

                        <td class="px-6 py-4">
                            Rp240.000
                        </td>

                        <td class="px-6 py-4">
                            30
                        </td>

                    </tr>

                    @endfor

                </tbody>

            </table>

        </div>


        <div class="px-6 py-4 text-right">

            <a href="#"
                class="text-white/60 text-sm hover:underline transition">
                Unduh Laporan →
            </a>

        </div>

    </div>

</div>
@endsection
```
