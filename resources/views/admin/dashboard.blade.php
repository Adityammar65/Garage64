@extends('template.admin')
@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard')
@section('content')
    <div class="flex flex-col p-2 gap-3">
        <div class="flex gap-3">

            <!-- Best Seller Product -->
            <div
                class="w-1/2 flex items-center justify-center py-2 bg-gray-800 rounded-lg drop-shadow-lg hover:bg-gray-700 transition duration-150">
                <img src="{{ asset('assets/products/showcases/MGT-Penske.png') }}" alt="Produk Terlaris" class="w-1/2 rounded">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold ml-4 text-white">Produk Terlaris:</h2>
                    <h2 class="text-2xl font-bold ml-4 text-white">MiniGT Porsche 963 #7</h2>
                    <br>
                    <p class="ml-4 font-medium text-white">
                        Total Produk Terjual: 20 unit<br>
                        Total Pendapatan: Rp 1.500.000<br>
                    </p>
                </div>
            </div>

            <!-- Total Sales and Revenue -->
            <div
                class="w-1/2 flex flex-col items-center justify-center py-2 bg-gray-800 rounded-lg drop-shadow-lg hover:bg-gray-700 transition duration-150">
                <h2 class="text-white font-bold text-2xl">Total Penjualan</h2>
                <h2 class="text-white font-bold text-2xl">100</h2>
                <br>
                <h2 class="text-white font-bold text-2xl">Total Pendapatan</h2>
                <h2 class="text-white font-bold text-2xl">Rp100.000.000</h2>
                <br>
                <p class="text-white/60 decoration-none text-sm hover:underline">
                    <a href="{{ url('/admin/laporan') }}" class="flex items-center">Lihat Laporan Penjualan
                        <svg width="20px" height="20px" viewBox="0 -0.5 25 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M12.5 6.25C12.9142 6.25 13.25 5.91421 13.25 5.5C13.25 5.08579 12.9142 4.75 12.5 4.75V6.25ZM20.25 12.5C20.25 12.0858 19.9142 11.75 19.5 11.75C19.0858 11.75 18.75 12.0858 18.75 12.5H20.25ZM19.5 6.25C19.9142 6.25 20.25 5.91421 20.25 5.5C20.25 5.08579 19.9142 4.75 19.5 4.75V6.25ZM15.412 4.75C14.9978 4.75 14.662 5.08579 14.662 5.5C14.662 5.91421 14.9978 6.25 15.412 6.25V4.75ZM20.25 5.5C20.25 5.08579 19.9142 4.75 19.5 4.75C19.0858 4.75 18.75 5.08579 18.75 5.5H20.25ZM18.75 9.641C18.75 10.0552 19.0858 10.391 19.5 10.391C19.9142 10.391 20.25 10.0552 20.25 9.641H18.75ZM20.0303 6.03033C20.3232 5.73744 20.3232 5.26256 20.0303 4.96967C19.7374 4.67678 19.2626 4.67678 18.9697 4.96967L20.0303 6.03033ZM11.9697 11.9697C11.6768 12.2626 11.6768 12.7374 11.9697 13.0303C12.2626 13.3232 12.7374 13.3232 13.0303 13.0303L11.9697 11.9697ZM12.5 4.75H9.5V6.25H12.5V4.75ZM9.5 4.75C6.87665 4.75 4.75 6.87665 4.75 9.5H6.25C6.25 7.70507 7.70507 6.25 9.5 6.25V4.75ZM4.75 9.5V15.5H6.25V9.5H4.75ZM4.75 15.5C4.75 18.1234 6.87665 20.25 9.5 20.25V18.75C7.70507 18.75 6.25 17.2949 6.25 15.5H4.75ZM9.5 20.25H15.5V18.75H9.5V20.25ZM15.5 20.25C18.1234 20.25 20.25 18.1234 20.25 15.5H18.75C18.75 17.2949 17.2949 18.75 15.5 18.75V20.25ZM20.25 15.5V12.5H18.75V15.5H20.25ZM19.5 4.75H15.412V6.25H19.5V4.75ZM18.75 5.5V9.641H20.25V5.5H18.75ZM18.9697 4.96967L11.9697 11.9697L13.0303 13.0303L20.0303 6.03033L18.9697 4.96967Z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                    </a>
                </p>
            </div>
        </div>

        <!-- Best Products Table -->
        <div class="w-full flex items-center justify-center p-2 bg-gray-800 rounded-lg drop-shadow-lg gap-3">
            <div class="w-1/2 hover:bg-gray-700 transition duration-150 text-center rounded-lg">
                <h2 class="text-white font-bold text-xl">Produk:</h2>
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
                <p class="text-white/60 decoration-none text-sm hover:underline pt-4 pb-2 pl-10">
                    <a href="{{ url('/admin/laporan') }}" class="flex items-center w-full">Lihat Seluruh Produk
                        <svg width="20px" height="20px" viewBox="0 -0.5 25 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M12.5 6.25C12.9142 6.25 13.25 5.91421 13.25 5.5C13.25 5.08579 12.9142 4.75 12.5 4.75V6.25ZM20.25 12.5C20.25 12.0858 19.9142 11.75 19.5 11.75C19.0858 11.75 18.75 12.0858 18.75 12.5H20.25ZM19.5 6.25C19.9142 6.25 20.25 5.91421 20.25 5.5C20.25 5.08579 19.9142 4.75 19.5 4.75V6.25ZM15.412 4.75C14.9978 4.75 14.662 5.08579 14.662 5.5C14.662 5.91421 14.9978 6.25 15.412 6.25V4.75ZM20.25 5.5C20.25 5.08579 19.9142 4.75 19.5 4.75C19.0858 4.75 18.75 5.08579 18.75 5.5H20.25ZM18.75 9.641C18.75 10.0552 19.0858 10.391 19.5 10.391C19.9142 10.391 20.25 10.0552 20.25 9.641H18.75ZM20.0303 6.03033C20.3232 5.73744 20.3232 5.26256 20.0303 4.96967C19.7374 4.67678 19.2626 4.67678 18.9697 4.96967L20.0303 6.03033ZM11.9697 11.9697C11.6768 12.2626 11.6768 12.7374 11.9697 13.0303C12.2626 13.3232 12.7374 13.3232 13.0303 13.0303L11.9697 11.9697ZM12.5 4.75H9.5V6.25H12.5V4.75ZM9.5 4.75C6.87665 4.75 4.75 6.87665 4.75 9.5H6.25C6.25 7.70507 7.70507 6.25 9.5 6.25V4.75ZM4.75 9.5V15.5H6.25V9.5H4.75ZM4.75 15.5C4.75 18.1234 6.87665 20.25 9.5 20.25V18.75C7.70507 18.75 6.25 17.2949 6.25 15.5H4.75ZM9.5 20.25H15.5V18.75H9.5V20.25ZM15.5 20.25C18.1234 20.25 20.25 18.1234 20.25 15.5H18.75C18.75 17.2949 17.2949 18.75 15.5 18.75V20.25ZM20.25 15.5V12.5H18.75V15.5H20.25ZM19.5 4.75H15.412V6.25H19.5V4.75ZM18.75 5.5V9.641H20.25V5.5H18.75ZM18.9697 4.96967L11.9697 11.9697L13.0303 13.0303L20.0303 6.03033L18.9697 4.96967Z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                    </a>
                </p>
            </div>

            <!-- New Order Table -->
            <div class="w-1/2 hover:bg-gray-700 transition duration-150 text-center rounded-lg">
                <h2 class="text-white font-bold text-xl">Pesanan Terbaru:</h2>
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
                <p class="text-white/60 decoration-none text-sm hover:underline pt-4 pb-2 pl-10">
                    <a href="{{ url('/admin/laporan') }}" class="flex items-center">Lihat Seluruh Pesanan
                        <svg width="20px" height="20px" viewBox="0 -0.5 25 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M12.5 6.25C12.9142 6.25 13.25 5.91421 13.25 5.5C13.25 5.08579 12.9142 4.75 12.5 4.75V6.25ZM20.25 12.5C20.25 12.0858 19.9142 11.75 19.5 11.75C19.0858 11.75 18.75 12.0858 18.75 12.5H20.25ZM19.5 6.25C19.9142 6.25 20.25 5.91421 20.25 5.5C20.25 5.08579 19.9142 4.75 19.5 4.75V6.25ZM15.412 4.75C14.9978 4.75 14.662 5.08579 14.662 5.5C14.662 5.91421 14.9978 6.25 15.412 6.25V4.75ZM20.25 5.5C20.25 5.08579 19.9142 4.75 19.5 4.75C19.0858 4.75 18.75 5.08579 18.75 5.5H20.25ZM18.75 9.641C18.75 10.0552 19.0858 10.391 19.5 10.391C19.9142 10.391 20.25 10.0552 20.25 9.641H18.75ZM20.0303 6.03033C20.3232 5.73744 20.3232 5.26256 20.0303 4.96967C19.7374 4.67678 19.2626 4.67678 18.9697 4.96967L20.0303 6.03033ZM11.9697 11.9697C11.6768 12.2626 11.6768 12.7374 11.9697 13.0303C12.2626 13.3232 12.7374 13.3232 13.0303 13.0303L11.9697 11.9697ZM12.5 4.75H9.5V6.25H12.5V4.75ZM9.5 4.75C6.87665 4.75 4.75 6.87665 4.75 9.5H6.25C6.25 7.70507 7.70507 6.25 9.5 6.25V4.75ZM4.75 9.5V15.5H6.25V9.5H4.75ZM4.75 15.5C4.75 18.1234 6.87665 20.25 9.5 20.25V18.75C7.70507 18.75 6.25 17.2949 6.25 15.5H4.75ZM9.5 20.25H15.5V18.75H9.5V20.25ZM15.5 20.25C18.1234 20.25 20.25 18.1234 20.25 15.5H18.75C18.75 17.2949 17.2949 18.75 15.5 18.75V20.25ZM20.25 15.5V12.5H18.75V15.5H20.25ZM19.5 4.75H15.412V6.25H19.5V4.75ZM18.75 5.5V9.641H20.25V5.5H18.75ZM18.9697 4.96967L11.9697 11.9697L13.0303 13.0303L20.0303 6.03033L18.9697 4.96967Z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                    </a>
                </p>
            </div>
        </div>

        <!-- Complaint Table -->
        <div
            class="w-full flex flex-col items-center justify-center p-2 bg-gray-800 rounded-lg drop-shadow-lg hover:bg-gray-700 transition duration-150">
            <h2 class="text-white font-bold text-xl">Keluhan Terbaru:</h2>
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
            <p class="text-white/60 decoration-none text-sm hover:underline pt-4 pb-2">
                <a href="{{ url('/admin/laporan') }}" class="flex items-center">Lihat Seluruh Keluhan
                    <svg width="20px" height="20px" viewBox="0 -0.5 25 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M12.5 6.25C12.9142 6.25 13.25 5.91421 13.25 5.5C13.25 5.08579 12.9142 4.75 12.5 4.75V6.25ZM20.25 12.5C20.25 12.0858 19.9142 11.75 19.5 11.75C19.0858 11.75 18.75 12.0858 18.75 12.5H20.25ZM19.5 6.25C19.9142 6.25 20.25 5.91421 20.25 5.5C20.25 5.08579 19.9142 4.75 19.5 4.75V6.25ZM15.412 4.75C14.9978 4.75 14.662 5.08579 14.662 5.5C14.662 5.91421 14.9978 6.25 15.412 6.25V4.75ZM20.25 5.5C20.25 5.08579 19.9142 4.75 19.5 4.75C19.0858 4.75 18.75 5.08579 18.75 5.5H20.25ZM18.75 9.641C18.75 10.0552 19.0858 10.391 19.5 10.391C19.9142 10.391 20.25 10.0552 20.25 9.641H18.75ZM20.0303 6.03033C20.3232 5.73744 20.3232 5.26256 20.0303 4.96967C19.7374 4.67678 19.2626 4.67678 18.9697 4.96967L20.0303 6.03033ZM11.9697 11.9697C11.6768 12.2626 11.6768 12.7374 11.9697 13.0303C12.2626 13.3232 12.7374 13.3232 13.0303 13.0303L11.9697 11.9697ZM12.5 4.75H9.5V6.25H12.5V4.75ZM9.5 4.75C6.87665 4.75 4.75 6.87665 4.75 9.5H6.25C6.25 7.70507 7.70507 6.25 9.5 6.25V4.75ZM4.75 9.5V15.5H6.25V9.5H4.75ZM4.75 15.5C4.75 18.1234 6.87665 20.25 9.5 20.25V18.75C7.70507 18.75 6.25 17.2949 6.25 15.5H4.75ZM9.5 20.25H15.5V18.75H9.5V20.25ZM15.5 20.25C18.1234 20.25 20.25 18.1234 20.25 15.5H18.75C18.75 17.2949 17.2949 18.75 15.5 18.75V20.25ZM20.25 15.5V12.5H18.75V15.5H20.25ZM19.5 4.75H15.412V6.25H19.5V4.75ZM18.75 5.5V9.641H20.25V5.5H18.75ZM18.9697 4.96967L11.9697 11.9697L13.0303 13.0303L20.0303 6.03033L18.9697 4.96967Z"
                                fill="#fff"></path>
                        </g>
                    </svg>
                </a>
            </p>
        </div>
    </div>
@endsection
