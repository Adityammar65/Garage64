@extends('template.admin')
@section('title', 'Daftar Order')
@section('page_title', 'Order')
@section('content')
    <div class="flex flex-col gap-6">
        <h2 class="text-2xl font-bold text-white text-center">Daftar Order Masuk</h2>

        <!-- Order List -->
        <div class="overflow-x-auto bg-gray-800 rounded-xl shadow-xl overflow-hidden border border-gray-700">
            <table class="min-w-full text-center text-sm text-white">
                <thead class="uppercase tracking-wider bg-gray-700/50">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                            Order Id
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Customer
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Produk
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Qty
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($orders as $order)

                        <tr class="border-b border-gray-700 hover:bg-gray-700/40 transition">

                            <td class="px-6 py-4">
                                {{ $order->order_id }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $order->user->username }}
                            </td>

                            <td class="px-6 py-4 text-left">
                                @foreach ($order->detailTransaksi as $detail)
                                    <div>
                                        • {{ $detail->produk->nama_produk }}
                                    </div>
                                @endforeach
                            </td>

                            <td class="px-6 py-4">
                                {{ $order->total_qty }}
                            </td>

                            <td class="px-6 py-4">
                                Rp{{ number_format($order->total_harga, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4">

                                @switch($order->status)
                                    @case('diproses')
                                        <span class="bg-blue-600 px-2 py-1 rounded text-xs">
                                            Diproses
                                        </span>
                                    @break

                                    @case('dikirim')
                                        <span class="bg-purple-600 px-2 py-1 rounded text-xs">
                                            Dikirim
                                        </span>
                                    @break

                                    @case('selesai')
                                        <span class="bg-green-600 px-2 py-1 rounded text-xs">
                                            Selesai
                                        </span>
                                    @break

                                    @default
                                        <span class="bg-red-600 px-2 py-1 rounded text-xs">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                @endswitch

                            </td>

                            <td class="px-6 py-4">
                                {{ $order->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4">
                                <a href="{{ url('/admin/order/' . $order->id_transaksi) }}"
                                    class="bg-blue-500 hover:bg-blue-600 px-3 py-2 rounded">
                                    Detail
                                </a>
                            </td>

                        </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="py-10 text-center text-gray-400">
                                    Belum ada pesanan.
                                </td>
                            </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
