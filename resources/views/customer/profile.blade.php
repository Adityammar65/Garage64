@extends('template.customer')
@section('title','Profil Saya')
@section('content')

<div class="max-w-7xl mx-auto p-6">

    <div class="rounded-2xl bg-gradient-to-r from-black via-gray-900 to-red-700 text-white p-8 shadow-xl">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="flex items-center gap-6">
                <div class="w-28 h-28 rounded-full bg-white text-red-600 flex items-center justify-center text-5xl font-bold">
                    {{ strtoupper(substr(Auth::user()->name ?? 'C',0,1)) }}
                </div>
                <div>
                    <h1 class="text-3xl font-bold">{{ Auth::user()->name ?? 'Customer' }}</h1>
                    <p class="text-gray-200">{{ Auth::user()->email ?? 'customer@garage64.com' }}</p>
                    <span class="inline-block mt-2 bg-green-500 px-3 py-1 rounded-full text-sm">
                        Member Aktif
                    </span>
                </div>
            </div>

            <a href="#" class="mt-5 md:mt-0 bg-white text-red-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">
                Edit Profil
            </a>
        </div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mt-8">
        @php
            $cards = [
                ['12','Total Pesanan'],
                ['5','Wishlist'],
                ['3','Keranjang'],
                ['Rp2.5 Jt','Total Belanja'],
            ];
        @endphp

        @foreach($cards as $card)
        <div class="bg-white rounded-xl shadow p-6 text-center">
            <h2 class="text-3xl font-bold text-red-600">{{ $card[0] }}</h2>
            <p class="text-gray-600 mt-2">{{ $card[1] }}</p>
        </div>
        @endforeach
    </div>

    <div class="grid lg:grid-cols-3 gap-6 mt-8">

        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-bold mb-5">Informasi Akun</h2>

            <div class="space-y-4">
                <div>
                    <small class="text-gray-500">Nama</small>
                    <p class="font-semibold">{{ Auth::user()->name ?? '-' }}</p>
                </div>

                <div>
                    <small class="text-gray-500">Email</small>
                    <p class="font-semibold">{{ Auth::user()->email ?? '-' }}</p>
                </div>

                <div>
                    <small class="text-gray-500">No. HP</small>
                    <p class="font-semibold">0812xxxxxxxx</p>
                </div>

                <div>
                    <small class="text-gray-500">Alamat</small>
                    <p class="font-semibold">Yogyakarta, Indonesia</p>
                </div>

                <div>
                    <small class="text-gray-500">Member Sejak</small>
                    <p class="font-semibold">2026</p>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-bold mb-6">Edit Profil</h2>

            <form class="space-y-5">

                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label>Nama</label>
                        <input type="text" class="w-full border rounded-lg p-3 mt-1"
                            value="{{ Auth::user()->name ?? '' }}">
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" class="w-full border rounded-lg p-3 mt-1"
                            value="{{ Auth::user()->email ?? '' }}">
                    </div>

                    <div>
                        <label>No. HP</label>
                        <input type="text" class="w-full border rounded-lg p-3 mt-1">
                    </div>

                    <div>
                        <label>Alamat</label>
                        <input type="text" class="w-full border rounded-lg p-3 mt-1">
                    </div>
                </div>

                <hr>

                <h3 class="font-bold">Ubah Password</h3>

                <div class="grid md:grid-cols-3 gap-4">
                    <input type="password" placeholder="Password Lama" class="border rounded-lg p-3">
                    <input type="password" placeholder="Password Baru" class="border rounded-lg p-3">
                    <input type="password" placeholder="Konfirmasi Password" class="border rounded-lg p-3">
                </div>

                <div class="text-right">
                    <button class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>

    </div>

    <div class="bg-white rounded-xl shadow mt-8 p-6">
        <h2 class="text-xl font-bold mb-5">Aktivitas Terakhir</h2>

        @php
            $logs=[
                "Pesanan #INV001 selesai",
                "Menambahkan produk ke keranjang",
                "Mengubah profil",
                "Login dari perangkat baru"
            ];
        @endphp

        @foreach($logs as $log)
        <div class="flex justify-between border-b py-3">
            <span>{{ $log }}</span>
            <span class="text-gray-500">Baru saja</span>
        </div>
        @endforeach
    </div>

</div>

@endsection
