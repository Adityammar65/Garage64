@extends('template.form')
@section('title', 'Edit Informasi Toko')
@section('content')
    <div class="mx-auto py-16 px-8">
        <form action="{{ url('/admin/pengaturan/save-info-toko') }}" method="POST">
            @csrf

            <div class="space-y-12">
                <div class="pb-4">
                    <h2 class="text-2xl font-semibold text-white">
                        Edit Informasi Toko
                    </h2>

                    <div class="pb-4 mt-4">
                        <div class="mt-10 grid grid-cols-6 gap-x-6 gap-y-8">

                            {{-- Nama Toko --}}
                            <div class="col-span-full">
                                <label for="nama_toko" class="block text-xl font-bold text-white">
                                    Nama Toko
                                </label>

                                <div class="mt-2">
                                    <input id="nama_toko" type="text" name="nama_toko"
                                        value="{{ old('nama_toko', $store['nama_toko'] ?? '') }}"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-white outline-1 -outline-offset-1 outline-white/10 focus:outline-2 focus:outline-blue-500">
                                </div>

                                @error('nama_toko')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Alamat --}}
                            <div class="col-span-full">
                                <label for="alamat_toko" class="block text-xl font-bold text-white">
                                    Alamat Toko
                                </label>

                                <div class="mt-2">
                                    <textarea id="alamat_toko" name="alamat_toko" rows="3"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-white outline-1 -outline-offset-1 outline-white/10 focus:outline-2 focus:outline-blue-500">{{ old('alamat_toko', $store['alamat_toko'] ?? '') }}</textarea>
                                </div>

                                @error('alamat_toko')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Nomor Telepon --}}
                            <div class="col-span-3">
                                <label for="no_telp_toko" class="block text-xl font-bold text-white">
                                    No. Telepon
                                </label>

                                <div class="mt-2">
                                    <input id="no_telp_toko" type="text" name="no_telp_toko"
                                        value="{{ old('no_telp_toko', $store['no_telp_toko'] ?? '') }}"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-white outline-1 -outline-offset-1 outline-white/10 focus:outline-2 focus:outline-blue-500">
                                </div>

                                @error('no_telp_toko')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="col-span-3">
                                <label for="email_toko" class="block text-xl font-bold text-white">
                                    Email Toko
                                </label>

                                <div class="mt-2">
                                    <input id="email_toko" type="email" name="email_toko"
                                        value="{{ old('email_toko', $store['email_toko'] ?? '') }}"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-white outline-1 -outline-offset-1 outline-white/10 focus:outline-2 focus:outline-blue-500">
                                </div>

                                @error('email_toko')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Jam Operasional --}}
                            <div class="col-span-full">
                                <h2 class="text-xl font-semibold text-white">
                                    Jam Operasional
                                </h2>
                            </div>

                            {{-- Jam Buka --}}
                            <div class="col-span-3">
                                <label for="jam_buka" class="block text-xl font-bold text-white">
                                    Jam Buka
                                </label>

                                <div class="mt-2">
                                    <input id="jam_buka" type="time" name="jam_buka"
                                        value="{{ old('jam_buka', $store['jam_buka'] ?? '') }}"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-white outline-1 -outline-offset-1 outline-white/10 focus:outline-2 focus:outline-blue-500">
                                </div>

                                @error('jam_buka')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Jam Tutup --}}
                            <div class="col-span-3">
                                <label for="jam_tutup" class="block text-xl font-bold text-white">
                                    Jam Tutup
                                </label>

                                <div class="mt-2">
                                    <input id="jam_tutup" type="time" name="jam_tutup"
                                        value="{{ old('jam_tutup', $store['jam_tutup'] ?? '') }}"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-white outline-1 -outline-offset-1 outline-white/10 focus:outline-2 focus:outline-blue-500">
                                </div>

                                @error('jam_tutup')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-1 flex items-center justify-end gap-x-6">
                <a href="{{ url()->previous() }}"
                    class="rounded-md bg-red-500 px-3 py-2 text-xl font-bold text-white hover:bg-red-600">
                    Batal
                </a>

                <button type="submit"
                    class="rounded-md bg-green-500 px-3 py-2 text-xl font-bold text-white hover:bg-green-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
