@extends('template.admin')
@section('title', 'Support')
@section('page_title', 'Support')
@section('content')
```blade
@section('content')
<div class="flex flex-col gap-6 p-4">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-white">
            Daftar Keluhan
        </h2>

        <span class="text-sm text-white/60">
            Customer Support
        </span>
    </div>


    <!-- Complaint Card -->
    <div class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="min-w-full text-left text-sm whitespace-nowrap text-white">

                <thead class="uppercase tracking-wider bg-gray-700/50 border-b border-gray-600">

                    <tr>
                        <th class="px-6 py-4">
                            Pengirim
                        </th>

                        <th class="px-6 py-4">
                            Subjek
                        </th>

                        <th class="px-6 py-4">
                            Keluhan
                        </th>

                        <th class="px-6 py-4">
                            Status
                        </th>

                        <th class="px-6 py-4 text-center">
                            Aksi
                        </th>
                    </tr>

                </thead>


                <tbody>

                    <tr class="border-b border-gray-700 hover:bg-gray-700/40 transition">

                        <th class="px-6 py-5 font-medium">
                            John Doe
                        </th>

                        <td class="px-6 py-5">
                            Pengiriman terlambat
                        </td>

                        <td class="px-6 py-5 max-w-md whitespace-normal text-white/80">
                            Pesanan saya belum sampai setelah 2 minggu. Mohon segera ditindaklanjuti.
                        </td>

                        <td class="px-6 py-5">
                            <span class="px-3 py-1 rounded-full text-xs border border-gray-500">
                                Belum Ditangani
                            </span>
                        </td>

                        <td class="px-6 py-5 text-center">
                            <a href="{{ url('/admin/support/reply') }}"
                               class="text-blue-500 hover:text-blue-700 font-bold transition">
                                Lihat Detail
                            </a>
                        </td>

                    </tr>


                    @foreach([
                        ['Jane Smith','Produk bermasalah','Produk yang saya terima memiliki cacat. Mohon diganti dengan yang baru.','Sedang Ditangani'],
                        ['Xiao Li','Pengiriman terlambat','Pesanan saya belum sampai setelah 2 minggu. Mohon segera ditindaklanjuti.','Sudah Ditangani'],
                        ['Pedro Alvarez','Produk bermasalah','Produk yang saya terima memiliki cacat. Mohon diganti dengan yang baru.','Sudah Ditangani'],
                        ['Hannah Kim','Akun Bermasalah','Akun saya mengalami masalah saat login. Mohon bantuannya.','Sudah Ditangani']
                    ] as $data)

                    <tr class="border-b border-gray-700 hover:bg-gray-700/40 transition">

                        <th class="px-6 py-5 font-medium">
                            {{ $data[0] }}
                        </th>

                        <td class="px-6 py-5">
                            {{ $data[1] }}
                        </td>

                        <td class="px-6 py-5 max-w-md whitespace-normal text-white/80">
                            {{ $data[2] }}
                        </td>

                        <td class="px-6 py-5">
                            <span class="px-3 py-1 rounded-full text-xs border border-gray-500">
                                {{ $data[3] }}
                            </span>
                        </td>

                        <td class="px-6 py-5 text-center">

                            <a href="#"
                               class="text-blue-500 hover:text-blue-700 font-bold transition">
                                Lihat Detail
                            </a>

                        </td>

                    </tr>

                    @endforeach


                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection
```

