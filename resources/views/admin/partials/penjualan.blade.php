<div class="w-full bg-gray-800 rounded-xl shadow-xl overflow-hidden border border-gray-700">

    <div class="flex justify-between items-center px-6 py-4 border-b border-gray-700">

        <h2 class="text-xl font-bold text-white">

            Laporan Penjualan

        </h2>

        <span class="text-white/60 text-sm">

            {{ $laporanPenjualan->total() }} Data

        </span>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full text-white text-sm">

            <thead class="bg-gray-700/40 uppercase">

                <tr>

                    <th class="px-6 py-4 text-left">
                        Produk
                    </th>

                    <th class="text-center">
                        Qty
                    </th>

                    <th class="text-center">
                        Harga
                    </th>

                    <th class="text-center">
                        Subtotal
                    </th>

                    <th class="text-center">
                        Tanggal
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($laporanPenjualan as $item)
                    <tr class="border-b border-gray-700 hover:bg-gray-700/30">

                        <td class="px-6 py-4">

                            <div class="flex items-center gap-4">

                                <img src="{{ asset('storage/' . $item->produk->gambar) }}"
                                    class="w-14 h-14 rounded-lg object-cover">

                                <div>

                                    <h3 class="font-semibold">

                                        {{ $item->produk->nama_produk }}

                                    </h3>

                                    <p class="text-xs text-gray-400">

                                        {{ $item->produk->kode_produk }}

                                    </p>

                                </div>

                            </div>

                        </td>

                        <td class="text-center">

                            {{ $item->qty }}

                        </td>

                        <td class="text-center">

                            Rp {{ number_format($item->harga, 0, ',', '.') }}

                        </td>

                        <td class="text-center font-semibold text-green-400">

                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}

                        </td>

                        <td class="text-center">

                            {{ $item->transaksi->created_at->format('d M Y') }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="py-10 text-center text-gray-400">

                            Tidak ada data.

                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

    <div class="px-6 py-4">

        {{ $laporanPenjualan->withQueryString()->links() }}

    </div>

</div>
