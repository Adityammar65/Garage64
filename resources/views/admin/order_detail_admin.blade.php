@extends('template.admin')
@section('title', 'Detail Order')
@section('page_title', 'Detail Order')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white">
                    Detail Order
                </h2>
                <p class="text-gray-400 text-sm mt-1">
                    Order ID :
                    <span class="text-white font-medium">
                        {{ $transaksi->order_id }}
                    </span>
                </p>
            </div>

            <a href="{{ url('/admin/order') }}"
                class="inline-flex items-center gap-2 bg-gray-700 hover:bg-gray-600 transition px-4 py-2 rounded-lg text-white">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>

                Kembali
            </a>
        </div>

        <div class="bg-gray-800 rounded-xl border border-gray-700 shadow-lg">
            <div class="border-b border-gray-700 px-6 py-4">
                <h3 class="text-lg font-semibold text-white">
                    Informasi Pembayaran
                </h3>
            </div>

            <div class="p-6">
                <div class="mb-6">
                    @if ($transaksi->payment_status == 'paid')
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-500/20 text-green-400">

                            <span class="w-2 h-2 rounded-full bg-green-400"></span>

                            Sudah Dibayar

                        </span>
                    @elseif($transaksi->payment_status == 'pending')
                        <span
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-yellow-500/20 text-yellow-400">

                            <span class="w-2 h-2 rounded-full bg-yellow-400"></span>

                            Menunggu Pembayaran

                        </span>
                    @else
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-500/20 text-red-400">

                            <span class="w-2 h-2 rounded-full bg-red-400"></span>

                            Pembayaran Gagal

                        </span>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-400 text-sm">Metode Pembayaran</p>
                        <p class="text-white font-medium mt-1">
                            {{ $transaksi->metode_bayar ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-sm">Payment Type</p>
                        <p class="text-white font-medium mt-1">
                            {{ $transaksi->payment_type ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-sm">Transaction ID</p>
                        <p class="text-white font-medium break-all mt-1">
                            {{ $transaksi->transaction_id ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-sm">Dibayar Pada</p>
                        <p class="text-white font-medium mt-1">
                            {{ $transaksi->dibayar_pada
                                ? \Carbon\Carbon::parse($transaksi->dibayar_pada)->translatedFormat('d F Y H:i')
                                : '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 rounded-xl border border-gray-700 shadow-lg">
            <div class="border-b border-gray-700 px-6 py-4 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-white">
                    Rincian Produk
                </h3>

                <span class="text-sm text-gray-400">
                    {{ $transaksi->detailTransaksi->count() }} Produk
                </span>
            </div>

            <div class="p-6">
                <div class="space-y-5">
                    @foreach ($transaksi->detailTransaksi as $detail)
                        <div
                            class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-gray-700 rounded-lg p-4">
                            <div class="flex gap-4">
                                <img src="{{ asset('storage/' . $detail->produk->gambar) }}"
                                    class="w-24 h-24 rounded-lg object-cover border border-gray-600">
                                <div>
                                    <h4 class="text-white font-semibold text-lg">
                                        {{ $detail->produk->nama_produk }}
                                    </h4>

                                    <p class="text-gray-400 text-sm mt-1">
                                        {{ $detail->produk->brand }}
                                    </p>

                                    <p class="text-gray-500 text-xs mt-1">
                                        {{ $detail->produk->kode_produk }}
                                    </p>
                                </div>
                            </div>

                            <div class="text-right">
                                <div class="text-gray-400 text-sm">
                                    Harga
                                </div>

                                <div class="text-white font-semibold">
                                    Rp {{ number_format($detail->harga, 0, ',', '.') }}
                                </div>

                                <div class="mt-3 text-gray-400 text-sm">
                                    Qty
                                </div>

                                <div class="text-white font-semibold">
                                    x{{ $detail->qty }}
                                </div>

                                <div class="mt-3 text-gray-400 text-sm">
                                    Subtotal
                                </div>

                                <div class="text-green-400 font-bold text-lg">
                                    Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 border-t border-gray-700 pt-6 flex flex-col md:flex-row justify-between gap-6">
                    <div>
                        <p class="text-gray-400">
                            Total Item
                        </p>

                        <p class="text-white font-semibold text-lg">
                            {{ $transaksi->total_qty }} Item
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="text-gray-400">
                            Total Pembayaran
                        </p>

                        <p class="text-2xl font-bold text-green-400">
                            Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 rounded-xl border border-gray-700 shadow-lg">
            <div class="border-b border-gray-700 px-6 py-4">
                <h3 class="text-lg font-semibold text-white">
                    Resi Pengiriman
                </h3>
            </div>

            <div class="p-6">
                @if ($transaksi->status == 'dikirim' || $transaksi->status == 'selesai')
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">
                                Nomor Resi
                            </p>

                            <p class="font-mono text-xl text-blue-400 mt-2">
                                {{ $transaksi->resi }}
                            </p>

                        </div>

                        <button onclick="navigator.clipboard.writeText('{{ $transaksi->resi }}')"
                            class="bg-blue-600 hover:bg-blue-700 transition px-4 py-2 rounded-lg text-white">

                            Copy

                        </button>
                    </div>
                @else
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-yellow-500/20 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6" />
                            </svg>
                        </div>

                        <div>
                            <h4 class="text-white font-semibold">
                                Resi Belum Tersedia
                            </h4>

                            <p class="text-gray-400 text-sm mt-1">
                                Nomor resi akan dibuat otomatis ketika admin mengubah
                                status pesanan menjadi <span class="text-blue-400">Dikirim</span>.
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="bg-gray-800 rounded-xl border border-gray-700 shadow-lg">
            <div class="border-b border-gray-700 px-6 py-4">
                <h3 class="text-lg font-semibold text-white">
                    Status Pesanan
                </h3>
            </div>

            <div class="p-6">
                @if ($transaksi->payment_status == 'paid')
                    <form action="{{ url('/admin/order/update/' . $transaksi->id_transaksi) }}" method="POST"
                        class="space-y-4">

                        @csrf
                        @method('PUT')

                        <select name="status"
                            class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:ring-2 focus:ring-blue-500">

                            <option value="diproses" {{ $transaksi->status == 'diproses' ? 'selected' : '' }}>
                                Diproses
                            </option>

                            <option value="dikirim" {{ $transaksi->status == 'dikirim' ? 'selected' : '' }}>
                                Dikirim
                            </option>

                            <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                            <option value="dibatalkan" {{ $transaksi->status == 'dibatalkan' ? 'selected' : '' }}>
                                Dibatalkan
                            </option>
                        </select>

                        <button
                            class="bg-blue-600 hover:bg-blue-700 transition px-5 py-3 rounded-lg text-white font-medium">

                            Simpan Perubahan

                        </button>
                    </form>
                @else
                    <div class="rounded-lg border border-yellow-500/30 bg-yellow-500/10 p-5">
                        <h4 class="text-yellow-400 font-semibold">
                            Menunggu Pembayaran
                        </h4>

                        <p class="text-gray-300 mt-2 text-sm">
                            Pesanan belum dibayar sehingga status pesanan belum dapat diubah.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
