@extends('template.form')
@section('title', 'Edit Produk')
@section('content')
    <div class="mx-auto py-16 px-8">
        <form action="{{ url('/admin/produk/update/' . $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-12">
                <div class="pb-4">
                    <h2 class="text-2xl font-semibold text-white">Edit Produk</h2>

                    <!-- Preview Foto -->
                    <div class="col-span-full mt-4">
                        <label class="block text-xl font-bold text-white">
                            Preview Foto Produk
                        </label>

                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-white/25 px-6 py-10">
                            <div class="text-center">

                                @if ($produk->gambar)
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}"
                                        class="mx-auto h-48 w-48 rounded-lg object-cover mb-4">
                                @else
                                    <svg viewBox="0 0 24 24" fill="currentColor" class="mx-auto size-12 text-gray-600">
                                        <path
                                            d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6Z" />
                                    </svg>
                                @endif

                                <div class="mt-4 flex text-sm text-gray-400 justify-center">
                                    <label for="foto_produk"
                                        class="cursor-pointer rounded-md font-semibold text-blue-400 hover:text-blue-300">
                                        <span>Ganti Foto Produk</span>
                                        <input id="foto_produk" type="file" name="foto_produk" class="sr-only">
                                    </label>
                                    <p class="pl-1">atau seret dan lepaskan</p>
                                </div>

                                <p class="text-xs text-gray-400">
                                    PNG, JPG, WEBP maks 10MB
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pb-4 mt-4">
                        <div class="mt-10 grid grid-cols-6 gap-x-6 gap-y-8">

                            {{-- Kode --}}
                            <div class="col-span-2">
                                <label class="block text-xl font-bold text-white">
                                    Kode Produk
                                </label>

                                <input type="text" name="kode_produk"
                                    value="{{ old('kode_produk', $produk->kode_produk) }}"
                                    class="mt-2 block w-full rounded-md bg-white/5 px-3 py-2 text-white">
                            </div>

                            {{-- Kategori --}}
                            <div class="col-span-2">
                                <label class="block text-xl font-bold text-white">
                                    Kategori
                                </label>

                                <select name="id_kategori"
                                    class="mt-2 block w-full rounded-md bg-gray-800/90 px-3 py-2 text-white">

                                    <option value="">Pilih Kategori</option>

                                    @foreach ($kategori as $ktg)
                                        <option value="{{ $ktg->id_kategori }}">
                                            {{ $ktg->nama_kategori }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            {{-- Brand --}}
                            <div class="col-span-2">
                                <label class="block text-xl font-bold text-white">
                                    Brand
                                </label>

                                <input type="text" name="brand" value="{{ old('brand', $produk->brand) }}"
                                    class="mt-2 block w-full rounded-md bg-white/5 px-3 py-2 text-white">
                            </div>

                            <!-- Nama -->
                            <div class="col-span-full">
                                <label class="block text-xl font-bold text-white">
                                    Nama Produk
                                </label>

                                <div class="mt-2">
                                    <input type="text" name="nama_produk"
                                        value="{{ old('nama_produk', $produk->nama_produk) }}"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-white outline-white/10 focus:outline-blue-500">
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="col-span-full">
                                <label class="block text-xl font-bold text-white">
                                    Deskripsi Produk
                                </label>

                                <div class="mt-2">
                                    <textarea name="deskripsi" rows="4"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-white outline-white/10 focus:outline-blue-500">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                                </div>
                            </div>

                            <!-- Skala -->
                            <div class="col-span-2">
                                <label class="block text-xl font-bold text-white">
                                    Skala
                                </label>

                                <div class="mt-2">
                                    <select name="skala" class="w-full rounded-md bg-gray-800 px-3 py-2 text-white">

                                        <option value="1:64"
                                            {{ old('skala', $produk->skala) == '1:64' ? 'selected' : '' }}>
                                            1:64
                                        </option>

                                        <option value="1:48"
                                            {{ old('skala', $produk->skala) == '1:48' ? 'selected' : '' }}>
                                            1:48
                                        </option>

                                        <option value="1:32"
                                            {{ old('skala', $produk->skala) == '1:32' ? 'selected' : '' }}>
                                            1:32
                                        </option>

                                        <option value="1:32"
                                            {{ old('skala', $produk->skala) == '1:24' ? 'selected' : '' }}>
                                            1:24
                                        </option>

                                        <option value="1:32"
                                            {{ old('skala', $produk->skala) == '1:18' ? 'selected' : '' }}>
                                            1:18
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <!-- Harga -->
                            <div class="col-span-2">
                                <label class="block text-xl font-bold text-white">
                                    Harga
                                </label>

                                <div class="mt-2">
                                    <div class="flex items-center rounded-md bg-white/5 pl-3">
                                        <span class="text-gray-400">Rp</span>

                                        <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}"
                                            class="block w-full bg-transparent py-2 px-2 text-white outline-none">
                                    </div>
                                </div>
                            </div>

                            <!-- Stok -->
                            <div class="col-span-2">
                                <label class="block text-xl font-bold text-white">
                                    Stok
                                </label>

                                <div class="mt-2">
                                    <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}"
                                        class="block w-full rounded-md bg-white/5 px-3 py-2 text-white outline-white/10 focus:outline-blue-500">
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-span-2">
                                <label class="block text-xl font-bold text-white">
                                    Status Produk
                                </label>

                                <select name="is_active"
                                    class="mt-2 block w-full rounded-md bg-gray-800 px-3 py-2 text-white">

                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>

                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-x-6">

                <a href="{{ url()->previous() }}"
                    class="rounded-md bg-red-500 px-4 py-2 text-xl font-bold text-white hover:bg-red-600">
                    Batal
                </a>

                <button type="submit"
                    class="rounded-md bg-green-500 px-4 py-2 text-xl font-bold text-white hover:bg-green-600">
                    Simpan Perubahan
                </button>

            </div>
        </form>
    </div>
@endsection
