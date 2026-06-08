@extends('template.customer')
@section('title', 'Pesanan Saya')
@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Pesanan Saya</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Kelola dan lacak semua pesanan Anda</p>
        </div>
        <a href="#" class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 transition text-white px-5 py-2.5 rounded-lg font-medium shadow-md hover:shadow-lg text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
            Pesan Baru
        </a>
    </div>

    {{-- Filter & Search --}}
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1 relative">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" placeholder="Cari pesanan..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-red-500 focus:border-transparent transition text-sm">
            </div>
            <div class="flex gap-3">
                <select class="px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-red-500 focus:border-transparent transition text-sm">
                    <option>Semua Status</option>
                    <option>Pending</option>
                    <option>Diproses</option>
                    <option>Dikirim</option>
                    <option>Selesai</option>
                    <option>Dibatalkan</option>
                </select>
                <select class="px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-red-500 focus:border-transparent transition text-sm">
                    <option>Terbaru</option>
                    <option>Terlama</option>
                    <option>Tertinggi</option>
                    <option>Terendah</option>
                </select>
            </div>
        </div>
    </div>

    {{-- Tabel Desktop --}}
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hidden md:block">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-100 dark:border-gray-700">
                    <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Pesanan</th>
                    <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Produk</th>
                    <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal</th>
                    <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Total</th>
                    <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                    <th class="text-right px-6 py-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @php
                    $allOrders = [
                        ['id' => '#INV-001', 'product' => 'Porsche 963 #7', 'qty' => 1, 'date' => '01 Jun 2026', 'total' => 'Rp 450.000', 'status' => 'Selesai'],
                        ['id' => '#INV-002', 'product' => 'Land Rover Defender 110', 'qty' => 2, 'date' => '29 Mei 2026', 'total' => 'Rp 640.000', 'status' => 'Diproses'],
                        ['id' => '#INV-003', 'product' => 'Toyota Tundra Black', 'qty' => 1, 'date' => '27 Mei 2026', 'total' => 'Rp 275.000', 'status' => 'Pending'],
                        ['id' => '#INV-004', 'product' => 'Nissan SILVIA (S15)', 'qty' => 1, 'date' => '25 Mei 2026', 'total' => 'Rp 380.000', 'status' => 'Dikirim'],
                        ['id' => '#INV-005', 'product' => 'MAZDA 787B No.18', 'qty' => 1, 'date' => '22 Mei 2026', 'total' => 'Rp 520.000', 'status' => 'Selesai'],
                        ['id' => '#INV-006', 'product' => 'Mercedes-AMG F1 W14', 'qty' => 1, 'date' => '20 Mei 2026', 'total' => 'Rp 350.000', 'status' => 'Dibatalkan'],
                        ['id' => '#INV-007', 'product' => 'Nissan Fairlady Z S30', 'qty' => 1, 'date' => '18 Mei 2026', 'total' => 'Rp 290.000', 'status' => 'Selesai'],
                        ['id' => '#INV-008', 'product' => 'Porsche 911 GT3 R (992)', 'qty' => 1, 'date' => '15 Mei 2026', 'total' => 'Rp 480.000', 'status' => 'Diproses'],
                    ];
                @endphp
                @foreach ($allOrders as $order)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition">
                    <td class="px-6 py-4">
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $order['id'] }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $order['product'] }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Qty: {{ $order['qty'] }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $order['date'] }}</td>
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900 dark:text-white">{{ $order['total'] }}</td>
                    <td class="px-6 py-4">
                        @php
                            $badge = match($order['status']) {
                                'Selesai' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                                'Diproses' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400',
                                'Dikirim' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                                'Pending' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                                'Dibatalkan' => 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-400',
                                default => 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300',
                            };
                        @endphp
                        <span class="inline-flex text-xs font-medium px-3 py-1 rounded-full {{ $badge }}">{{ $order['status'] }}</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ url('/customer/order-detail') }}?order={{ $order['id'] }}" class="inline-flex items-center gap-1 text-sm font-medium text-red-500 hover:text-red-600 transition">
                            Detail
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Kartu Mobile --}}
    <div class="md:hidden space-y-4">
        @foreach ($allOrders as $order)
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-4">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $order['id'] }}</span>
                @php
                    $badge = match($order['status']) {
                        'Selesai' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                        'Diproses' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400',
                        'Dikirim' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                        'Pending' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                        'Dibatalkan' => 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-400',
                        default => 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300',
                    };
                @endphp
                <span class="text-xs font-medium px-2.5 py-1 rounded-full {{ $badge }}">{{ $order['status'] }}</span>
            </div>
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $order['product'] }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Qty: {{ $order['qty'] }} • {{ $order['date'] }}</p>
                </div>
            </div>
            <div class="flex items-center justify-between pt-3 border-t border-gray-100 dark:border-gray-700">
                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $order['total'] }}</span>
                <a href="{{ url('/customer/order-detail') }}?order={{ $order['id'] }}" class="text-sm font-medium text-red-500 hover:text-red-600 transition flex items-center gap-1">
                    Detail
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-8">
        <p class="text-sm text-gray-500 dark:text-gray-400">Menampilkan 1-8 dari 24 pesanan</p>
        <nav class="flex items-center gap-1">
            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg text-sm text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg text-sm font-medium bg-red-500 text-white shadow-md">1</a>
            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">2</a>
            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">3</a>
            <span class="w-9 h-9 flex items-center justify-center text-sm text-gray-400">...</span>
            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">8</a>
            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg text-sm text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </nav>
    </div>
</div>

@endsection
