@extends('template.admin')
@section('title', 'Laporan')
@section('page_title', 'Laporan')
@section('content')
    <div class="flex flex-col gap-3 p-2">

        <!-- Sales Report -->
        <div class="w-full bg-gray-800 p-2 text-center rounded-lg drop-shadow-lg">
            <h2 class="text-white font-bold text-xl">Laporan Penjualan</h2>
            <table class="min-w-full text-center text-xs whitespace-nowrap text-white">
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
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <th scope="row" class="px-6 py-4">
                            MGT-001
                        </th>
                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>
                        <td class="px-6 py-4">Rp240.000</td>
                        <td class="px-6 py-4">30</td>
                    </tr>
                    <tr class="border-b">
                        <th scope="row" class="px-6 py-4">
                            MGT-001
                        </th>
                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>
                        <td class="px-6 py-4">Rp240.000</td>
                        <td class="px-6 py-4">30</td>
                    </tr>
                    <tr class="border-b">
                        <th scope="row" class="px-6 py-4">
                            MGT-001
                        </th>
                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>
                        <td class="px-6 py-4">Rp240.000</td>
                        <td class="px-6 py-4">30</td>
                    </tr>
                    <tr class="border-b">
                        <th scope="row" class="px-6 py-4">
                            MGT-001
                        </th>
                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>
                        <td class="px-6 py-4">Rp240.000</td>
                        <td class="px-6 py-4">30</td>
                    </tr>
                    <tr class="border-b">
                        <th scope="row" class="px-6 py-4">
                            MGT-001
                        </th>
                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>
                        <td class="px-6 py-4">Rp240.000</td>
                        <td class="px-6 py-4">30</td>
                    </tr>
                </tbody>
            </table>
            <p class="text-white/60 decoration-none text-sm hover:underline pt-6 pb-2">
                <a href="#">Unduh Laporan</a>
            </p>
        </div>

        <!-- Revenue Report -->
        <div class="w-full bg-gray-800 p-2 text-center rounded-lg drop-shadow-lg">
            <h2 class="text-white font-bold text-xl">Laporan Keuangan</h2>
            <table class="min-w-full text-center text-xs whitespace-nowrap text-white">
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
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <th scope="row" class="px-6 py-4">
                            MGT-001
                        </th>
                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>
                        <td class="px-6 py-4">Rp240.000</td>
                        <td class="px-6 py-4">30</td>
                    </tr>
                    <tr class="border-b">
                        <th scope="row" class="px-6 py-4">
                            MGT-001
                        </th>
                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>
                        <td class="px-6 py-4">Rp240.000</td>
                        <td class="px-6 py-4">30</td>
                    </tr>
                    <tr class="border-b">
                        <th scope="row" class="px-6 py-4">
                            MGT-001
                        </th>
                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>
                        <td class="px-6 py-4">Rp240.000</td>
                        <td class="px-6 py-4">30</td>
                    </tr>
                    <tr class="border-b">
                        <th scope="row" class="px-6 py-4">
                            MGT-001
                        </th>
                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>
                        <td class="px-6 py-4">Rp240.000</td>
                        <td class="px-6 py-4">30</td>
                    </tr>
                    <tr class="border-b">
                        <th scope="row" class="px-6 py-4">
                            MGT-001
                        </th>
                        <td class="px-6 py-4">
                            Porsche 963 #7
                        </td>
                        <td class="px-6 py-4">Rp240.000</td>
                        <td class="px-6 py-4">30</td>
                    </tr>
                </tbody>
            </table>
            <p class="text-white/60 decoration-none text-sm hover:underline pt-6 pb-2">
                <a href="#">Unduh Laporan</a>
            </p>
        </div>
    </div>
@endsection
