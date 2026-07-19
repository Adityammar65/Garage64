<div class="w-full bg-gray-800 rounded-xl shadow-xl overflow-hidden border border-gray-700">

    <div class="flex justify-between items-center px-6 py-4 border-b border-gray-700">

        <h2 class="text-xl font-bold text-white">

            Laporan Keuangan

        </h2>

        <span class="text-white/60 text-sm">

            {{ $laporanKeuangan->total() }} Transaksi

        </span>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full text-white text-sm">

            <thead class="bg-gray-700/40 uppercase">

                <tr>

                    <th class="px-6 py-4 text-left">
                        Order ID
                    </th>

                    <th>
                        Customer
                    </th>

                    <th>
                        Metode
                    </th>

                    <th>
                        Qty
                    </th>

                    <th>
                        Total
                    </th>

                    <th>
                        Status
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($laporanKeuangan as $item)
                    <tr class="border-b border-gray-700 hover:bg-gray-700/30">

                        <td class="px-6 py-4">

                            {{ $item->order_id }}

                        </td>

                        <td>

                            {{ $item->user->username }}

                        </td>

                        <td>

                            {{ $item->metode_bayar }}

                        </td>

                        <td>

                            {{ $item->total_qty }}

                        </td>

                        <td class="font-semibold text-green-400">

                            Rp {{ number_format($item->total_harga, 0, ',', '.') }}

                        </td>

                        <td>

                            @if ($item->payment_status == 'paid')
                                <span class="px-3 py-1 rounded-full bg-green-500/20 text-green-400">

                                    Paid

                                </span>
                            @elseif($item->payment_status == 'pending')
                                <span class="px-3 py-1 rounded-full bg-yellow-500/20 text-yellow-400">

                                    Pending

                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full bg-red-500/20 text-red-400">

                                    {{ ucfirst($item->payment_status) }}

                                </span>
                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="py-10 text-center text-gray-400">

                            Tidak ada transaksi.

                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

    <div class="px-6 py-4">

        {{ $laporanKeuangan->withQueryString()->links() }}

    </div>

</div>
