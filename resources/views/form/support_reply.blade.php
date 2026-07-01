@extends('template.form')
@section('title', 'Informasi Keluhan')
@section('content')
    <div class="mx-auto py-16 px-8">
        <form>
            <div class="space-y-12">
                <div class="pb-4">
                    <h2 class="text-2xl font-semibold text-white">Informasi Keluhan:</h2>
                    <div class="mt-4 ml-4 space-y-2">
                        <p class="text-lg text-white"><span class="font-bold">Pengirim:</span> John Doe</p>
                        <p class="text-lg text-white"><span class="font-bold">Subjek:</span> Pengiriman terlambat</p>
                        <p class="text-lg text-white"><span class="font-bold">Keluhan:</span> Pesanan saya belum sampai
                            setelah 2 minggu. Mohon segera ditindaklanjuti.</p>
                        <p class="text-lg text-white"><span class="font-bold">Status:</span> Belum Ditangani</p>
                    </div>

                    <h2 class="text-2xl font-semibold text-white mt-4">Balas:</h2>
                    <div class="pb-4 mt-4">
                        <div class="mt-10 grid grid-cols-6 gap-x-6 gap-y-8">
                            <div class="col-span-full">
                                <label for="nama_toko" class="block text-xl font-bold text-white">Subjek</label>
                                <div class="mt-2">
                                    <input id="nama_toko" type="text" name="nama_toko"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500 sm:text-sm/6" />
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="alamat_toko" class="block text-xl font-bold text-white">
                                    Tanggapan
                                </label>
                                <div class="mt-2">
                                    <textarea id="alamat_toko" name="alamat_toko" rows="3"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500 sm:text-sm/6"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-1 flex items-center justify-end gap-x-6">
                <a href="{{ url()->previous() }}"
                    class="rounded-md bg-red-500 px-3 py-2 text-xl font-bold text-white hover:bg-red-600">Batal</a>
                <button type="submit"
                    class="rounded-md bg-green-500 px-3 py-2 text-xl font-bold text-white hover:bg-green-600">Balas</button>
            </div>
        </form>
    </div>
@endsection
