@extends('template.customer')
@section('title', 'Profil Saya')
@section('content')

    <div class="max-w-7xl mx-auto p-6">

        <div class="rounded-2xl bg-gradient-to-r from-black via-gray-900 to-red-700 text-white p-8 shadow-xl">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center gap-6">
                    <div
                        class="w-28 h-28 rounded-full bg-white text-red-600 flex items-center justify-center text-5xl font-bold">
                        {{ strtoupper(substr($user->username, 0, 1)) }}
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold">{{ $user->username }}</h1>
                        <p class="text-gray-200">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mt-8">
            @php
                $cards = [['12', 'Total Pesanan'], ['3', 'Keranjang'], ['Rp2.5 Jt', 'Total Belanja']];
            @endphp

            @foreach ($cards as $card)
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
                        <p class="font-semibold">{{ $user->username }}</p>
                    </div>

                    <div>
                        <small class="text-gray-500">Email</small>
                        <p class="font-semibold">{{ $user->email }}</p>
                    </div>

                    <div>
                        <small class="text-gray-500">Alamat</small>
                        <p class="font-semibold">{{ $user->alamat }}</p>
                    </div>

                    <div>
                        <small class="text-gray-500">No HP</small>
                        <p class="font-semibold">{{ $user->no_hp }}</p>
                    </div>

                    <div>
                        <small class="text-gray-500">Member Sejak</small>
                        <p class="font-semibold">{{ $user->email_verified_at }}</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
                <h2 class="text-xl font-bold mb-6">Edit Profil</h2>

                <form action="{{ url('/profile/update') }}" method="POST" class="space-y-5">

                    @csrf
                    <div class="grid md:grid-cols-2 gap-5">

                        <div>
                            <label>Username</label>
                            <input type="text" name="username" class="w-full border rounded-lg p-3 mt-1"
                                value="{{ old('username', $user->username) }}">
                        </div>

                        <div>
                            <label>Email</label>
                            <input type="email" name="email" class="w-full border rounded-lg p-3 mt-1"
                                value="{{ old('email', $user->email) }}">
                        </div>

                        <!-- Full Width -->
                        <div class="md:col-span-2">
                            <label>Alamat</label>

                            <textarea name="alamat" rows="4" class="w-full border rounded-lg p-3 mt-1 resize-none">{{ old('alamat', $user->alamat) }}</textarea>
                        </div>

                    </div>

                    <hr>

                    <h3 class="text-xl font-bold mb-5">Pengaturan Akun</h3>

                    <div class="space-y-4">

                        <!-- Reset Password -->
                        <a href="{{ url('/reset-password') }}"
                            class="flex items-center justify-between rounded-xl border border-gray-200 p-4 hover:border-red-500 hover:bg-red-50 transition">

                            <div class="flex items-center gap-4">

                                <div>
                                    <h4 class="font-semibold">Reset Password</h4>
                                    <p class="text-sm text-gray-500">
                                        Ubah password akun untuk menjaga keamanan.
                                    </p>
                                </div>
                            </div>

                        </a>

                        <!-- Logout -->
                        <a href="{{ url('/logout') }}"
                            class="flex items-center justify-between rounded-xl border border-gray-200 p-4 hover:border-yellow-500 hover:bg-yellow-50 transition">

                            <div class="flex items-center gap-4">

                                <div>
                                    <h4 class="font-semibold">Logout</h4>
                                    <p class="text-sm text-gray-500">
                                        Keluar dari akun pada perangkat ini.
                                    </p>
                                </div>
                            </div>

                        </a>

                        <!-- Hapus Akun -->
                        <button onclick="confirmDeleteAccount()" type="button"
                            class="w-full flex items-center justify-between rounded-xl border border-red-300 p-4 hover:bg-red-50 transition">

                            <div class="flex items-center gap-4">

                                <div class="text-left">
                                    <h4 class="font-semibold text-red-600">
                                        Hapus Akun
                                    </h4>

                                    <p class="text-sm text-gray-500">
                                        Semua data akun akan dihapus secara permanen.
                                    </p>
                                </div>

                            </div>

                        </button>

                    </div>

                    <div class="text-right mt-8">

                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg">

                            Simpan Perubahan

                        </button>

                    </div>

                </form>
            </div>

        </div>

    </div>

@endsection
