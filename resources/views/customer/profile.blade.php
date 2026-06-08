@extends('template.customer')
@section('title', 'Profil Saya')
@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Profil Saya</h1>
        <p class="text-gray-500 dark:text-gray-400 mt-1">Kelola informasi akun Anda</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Sidebar --}}
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 text-center">
                <div class="relative inline-block mb-4">
                    <div class="w-28 h-28 rounded-full bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center text-white text-4xl font-bold mx-auto shadow-lg">
                        {{ strtoupper(substr(Auth::user()->name ?? 'C', 0, 1)) }}
                    </div>
                    <label class="absolute bottom-0 right-0 w-8 h-8 bg-red-500 hover:bg-red-600 transition rounded-full flex items-center justify-center cursor-pointer shadow-md">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <input type="file" class="hidden" accept="image/*">
                    </label>
                </div>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name ?? 'Customer' }}</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email ?? 'customer@garage64.com' }}</p>

                <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                    <div class="flex justify-center gap-2 text-xs text-gray-500 dark:text-gray-400">
                        <span class="bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 px-2 py-1 rounded-full font-medium">
                            {{ Auth::user()->is_verified ?? 'Akun Terverifikasi' }}
                        </span>
                    </div>
                </div>

                <div class="mt-4 space-y-2 text-left">
                    <div class="flex items-center gap-3 p-2 rounded-lg bg-gray-50 dark:bg-gray-700/50">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span class="text-sm text-gray-600 dark:text-gray-300 truncate">{{ Auth::user()->email ?? 'customer@garage64.com' }}</span>
                    </div>
                    <div class="flex items-center gap-3 p-2 rounded-lg bg-gray-50 dark:bg-gray-700/50">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span class="text-sm text-gray-600 dark:text-gray-300">Member sejak 2026</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Edit --}}
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Informasi Akun</h3>

                <form class="space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Nama Lengkap</label>
                            <input type="text" id="nama" value="{{ Auth::user()->name ?? 'Customer' }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-red-500 focus:border-transparent transition placeholder-gray-400"
                                placeholder="Nama lengkap">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Email</label>
                            <input type="email" id="email" value="{{ Auth::user()->email ?? 'customer@garage64.com' }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-red-500 focus:border-transparent transition placeholder-gray-400"
                                placeholder="Email">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">No. Telepon</label>
                            <input type="tel" id="phone" value="+62 812-3456-7890"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-red-500 focus:border-transparent transition placeholder-gray-400"
                                placeholder="No. telepon">
                        </div>
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Username</label>
                            <input type="text" id="username" value="customer_garage64"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 cursor-not-allowed"
                                disabled>
                        </div>
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Alamat</label>
                        <textarea id="alamat" rows="3"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-red-500 focus:border-transparent transition placeholder-gray-400"
                            placeholder="Alamat lengkap">Jl. Lorem No.123, Yogyakarta, Indonesia</textarea>
                    </div>

                    <div class="border-t border-gray-100 dark:border-gray-700 pt-5">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-4">Ubah Password</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label for="password_lama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Password Lama</label>
                                <input type="password" id="password_lama"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                                    placeholder="••••••••">
                            </div>
                            <div>
                                <label for="password_baru" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Password Baru</label>
                                <input type="password" id="password_baru"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                                    placeholder="••••••••">
                            </div>
                            <div>
                                <label for="konfirmasi_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Konfirmasi Password</label>
                                <input type="password" id="konfirmasi_password"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                                    placeholder="••••••••">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-2">
                        <button type="reset" class="px-6 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg transition">Batal</button>
                        <button type="submit" class="px-6 py-2.5 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-lg transition shadow-md hover:shadow-lg flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            {{-- Aktivitas Terakhir --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 mt-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Aktivitas Terakhir</h3>
                <div class="space-y-3">
                    @php
                        $activities = [
                            ['action' => 'Pesanan #INV-001 selesai', 'time' => '2 jam lalu'],
                            ['action' => 'Profil diperbarui', 'time' => '1 hari lalu'],
                            ['action' => 'Pesanan #INV-002 sedang diproses', 'time' => '3 hari lalu'],
                            ['action' => 'Bergabung sebagai member', 'time' => '30 hari lalu'],
                        ];
                    @endphp
                    @foreach ($activities as $activity)
                    <div class="flex items-center gap-3 p-3 rounded-lg bg-gray-50 dark:bg-gray-700/50">
                        <div class="w-2 h-2 rounded-full bg-red-500 flex-shrink-0"></div>
                        <p class="text-sm text-gray-700 dark:text-gray-300 flex-1">{{ $activity['action'] }}</p>
                        <span class="text-xs text-gray-400 flex-shrink-0">{{ $activity['time'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
