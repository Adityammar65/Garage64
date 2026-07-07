@extends('template.form')
@section('title', 'Tambah Produk')
@section('content')
    <div class="mx-auto py-16 px-8">
        <form action="{{ url('/admin/produk/save') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-12">
                <div class="pb-4">

                    {{-- Preview Gambar --}}
                    <div class="col-span-full mt-4">
                        <label for="gambar" class="block text-xl font-bold text-white">
                            Preview Foto Produk
                        </label>

                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-white/25 px-6 py-10">
                            <div class="text-center">

                                <img id="preview-image" src="https://placehold.co/300x200?text=Preview"
                                    class="mx-auto mb-4 hidden max-h-52 rounded object-contain">

                                <svg id="upload-icon" viewBox="0 0 24 24" fill="currentColor"
                                    class="mx-auto size-12 text-gray-600">
                                    <path
                                        d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Z" />
                                </svg>

                                <div class="mt-4 flex text-sm text-gray-400 justify-center">
                                    <label for="gambar"
                                        class="cursor-pointer rounded-md font-semibold text-blue-400 hover:text-blue-300">

                                        Upload Foto Produk

                                        <input id="gambar" type="file" name="gambar" accept="image/*" class="hidden">
                                    </label>

                                    <p class="pl-1">
                                        atau seret file ke sini
                                    </p>
                                </div>

                                <p class="text-xs text-gray-400">
                                    PNG, JPG, JPEG, WEBP (Maks. 10MB)
                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-6 gap-6">

                        {{-- Kode --}}
                        <div class="col-span-2">
                            <label class="block text-xl font-bold text-white">
                                Kode Produk
                            </label>

                            <input type="text" name="kode_produk" placeholder="MGT-001"
                                class="mt-2 block w-full rounded-md bg-white/5 px-3 py-2 text-white">
                        </div>

                        {{-- Kategori --}}
                        <div class="col-span-2">
                            <label class="block text-xl font-bold text-white">
                                Kategori
                            </label>

                            <select name="id_kategori" class="mt-2 block w-full rounded-md bg-gray-800/90 px-3 py-2 text-white">

                                <option value="">Pilih Kategori</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id_kategori }}">
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        {{-- Brand --}}
                        <div class="col-span-2">
                            <label class="block text-xl font-bold text-white">
                                Brand
                            </label>

                            <input type="text" name="brand" placeholder="Mini GT"
                                class="mt-2 block w-full rounded-md bg-white/5 px-3 py-2 text-white">
                        </div>

                        {{-- Nama --}}
                        <div class="col-span-full">
                            <label class="block text-xl font-bold text-white">
                                Nama Produk
                            </label>

                            <input type="text" name="nama_produk"
                                class="mt-2 block w-full rounded-md bg-white/5 px-3 py-2 text-white">
                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-span-full">
                            <label class="block text-xl font-bold text-white">
                                Deskripsi
                            </label>

                            <textarea name="deskripsi" rows="5" class="mt-2 block w-full rounded-md bg-white/5 px-3 py-2 text-white"></textarea>
                        </div>

                        {{-- Skala --}}
                        <div class="col-span-2">
                            <label class="block text-xl font-bold text-white">
                                Skala
                            </label>

                            <select name="skala" class="mt-2 block w-full rounded-md bg-gray-800 px-3 py-2 text-white">

                                <option value="1:64">1:64</option>
                                <option value="1:43">1:43</option>
                                <option value="1:32">1:32</option>
                                <option value="1:24">1:24</option>
                                <option value="1:18">1:18</option>
                            </select>
                        </div>

                        {{-- Harga --}}
                        <div class="col-span-2">
                            <label class="block text-xl font-bold text-white">
                                Harga
                            </label>

                            <div class="mt-2 flex rounded-md bg-white/5">
                                <span class="px-3 py-2 text-gray-400">Rp</span>

                                <input type="number" name="harga" min="0"
                                    class="w-full bg-transparent px-2 py-2 text-white focus:outline-none">
                            </div>
                        </div>

                        {{-- Stok --}}
                        <div class="col-span-2">
                            <label class="block text-xl font-bold text-white">
                                Stok
                            </label>

                            <input type="number" name="stok" min="0"
                                class="mt-2 block w-full rounded-md bg-white/5 px-3 py-2 text-white">
                        </div>

                        {{-- Status --}}
                        <div class="col-span-2">
                            <label class="block text-xl font-bold text-white">
                                Status Produk
                            </label>

                            <select name="is_active" class="mt-2 block w-full rounded-md bg-gray-800 px-3 py-2 text-white">

                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>

                            </select>
                        </div>

                    </div>

                </div>
            </div>

            <div class="mt-8 flex justify-end gap-4">
                <a href="{{ url()->previous() }}"
                    class="rounded-md bg-red-500 px-5 py-2 font-bold text-white hover:bg-red-600">
                    Batal
                </a>

                <button type="submit" class="rounded-md bg-green-500 px-5 py-2 font-bold text-white hover:bg-green-600">
                    Simpan Produk
                </button>
            </div>

        </form>

        <script>
            document.getElementById('gambar').addEventListener('change', function(e) {

                const file = e.target.files[0];

                if (file) {

                    document.getElementById('preview-image').src = URL.createObjectURL(file);
                    document.getElementById('preview-image').classList.remove('hidden');

                    document.getElementById('upload-icon').classList.add('hidden');
                }

            });
        </script>
    </div>
@endsection
