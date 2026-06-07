@extends('template.admin')
@section('title', 'Support')
@section('page_title', 'Support')
@section('content')
    <div class="flex flex-col gap-6">
        <h2 class="text-2xl font-bold text-white text-center">Daftar Keluhan</h2>
        
        <!-- Complaint List -->
        <div class="overflow-x-auto text-white">
            <table class="min-w-full text-left text-sm whitespace-nowrap">
                <thead class="uppercase tracking-wider border-b-2 dark:border-neutral-600">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                            Pengirim
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Subjek
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Keluhan
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            John Doe
                        </th>
                        <td class="px-6 py-4">
                            Pengiriman terlambat
                        </td>
                        <td class="px-6 py-4">
                            Pesanan saya belum sampai setelah 2 minggu. Mohon segera ditindaklanjuti.
                        </td>
                        <td class="px-6 py-4">
                            Belum Ditangani
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ url('/admin/support/reply') }}" class="text-blue-500 hover:text-blue-700 font-bold">Lihat Detail</a>
                        </td>
                    </tr>

                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            Jane Smith
                        </th>
                        <td class="px-6 py-4">
                            Produk bermasalah
                        </td>
                        <td class="px-6 py-4">
                            Produk yang saya terima memiliki cacat. Mohon diganti dengan yang baru.
                        </td>
                        <td class="px-6 py-4">
                            Sedang Ditangani
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700 font-bold">Lihat Detail</a>
                        </td>
                    </tr>

                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            Xiao Li
                        </th>
                        <td class="px-6 py-4">
                            Pengiriman terlambat
                        </td>
                        <td class="px-6 py-4">
                            Pesanan saya belum sampai setelah 2 minggu. Mohon segera ditindaklanjuti.
                        </td>
                        <td class="px-6 py-4">
                            Sudah Ditangani
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700 font-bold">Lihat Detail</a>
                        </td>
                    </tr>

                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            Pedro Alvarez
                        </th>
                        <td class="px-6 py-4">
                            Produk bermasalah
                        </td>
                        <td class="px-6 py-4">
                            Produk yang saya terima memiliki cacat. Mohon diganti dengan yang baru.
                        </td>
                        <td class="px-6 py-4">
                            Sudah Ditangani
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700 font-bold">Lihat Detail</a>
                        </td>
                    </tr>

                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            Hannah Kim
                        </th>
                        <td class="px-6 py-4">
                            Akun Bermasalah
                        </td>
                        <td class="px-6 py-4">
                            Akun saya mengalami masalah saat login. Mohon bantuannya.
                        </td>
                        <td class="px-6 py-4">
                            Sudah Ditangani
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700 font-bold">Lihat Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
