@extends('template.admin')
@section('title', 'Support')
@section('page_title', 'Support')
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

                        @forelse($services as $service)
                            <tr class="border-b border-gray-700 hover:bg-gray-700/40 transition">

                                <td class="px-6 py-5 font-medium">
                                    {{ $service->user->username }}
                                    <br>
                                    <span class="text-xs text-gray-400">
                                        {{ $service->user->email }}
                                    </span>
                                </td>

                                <td class="px-6 py-5">
                                    {{ $service->subjek }}
                                </td>

                                <td class="px-6 py-5 max-w-md whitespace-normal text-white/80">
                                    {{ Str::limit($service->pesan, 100) }}
                                </td>

                                <td class="px-6 py-5">

                                    @if ($service->status == 'menunggu' )
                                        <span class="px-3 py-1 rounded-full bg-yellow-500/20 text-yellow-400 text-xs">
                                            Menunggu
                                        </span>
                                    @elseif($service->status == 'diproses')
                                        <span class="px-3 py-1 rounded-full bg-blue-500/20 text-blue-400 text-xs">
                                            Diproses
                                        </span>
                                    @elseif($service->status == 'selesai')
                                        <span class="px-3 py-1 rounded-full bg-green-500/20 text-green-400 text-xs">
                                            Selesai
                                        </span>
                                    @endif

                                </td>

                                <td class="px-6 py-5 text-center">

                                    <a href="{{ url('/admin/support/' . $service->id_service) }}"
                                        class="bg-blue-500 text-white p-4 rounded-lg hover:text-blue-300 font-bold">

                                        Lihat Detail

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center py-10 text-gray-400">
                                    Belum ada keluhan dari customer.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
