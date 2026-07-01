@extends('template.form')
@section('title', 'Edit Produk')
@section('content')
    <div class="mx-auto py-16 px-8">
        <form>
            <div class="space-y-12">
                <div class="pb-4">
                    <h2 class="text-2xl font-semibold text-white">Edit Produk</h2>

                    <div class="col-span-full mt-4">
                        <label for="foto_produk" class="block text-xl font-bold text-white">Preview Foto Produk</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-white/25 px-6 py-10">
                            <div class="text-center">
                                <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true"
                                    class="mx-auto size-12 text-gray-600">
                                    <path
                                        d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                        clip-rule="evenodd" fill-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm/6 text-gray-400">
                                    <label for="foto_produk"
                                        class="relative cursor-pointer rounded-md bg-transparent font-semibold text-blue-400 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-blue-500 hover:text-blue-300">
                                        <span>Upload foto produk</span>
                                        <input id="foto_produk" type="file" name="foto_produk" class="sr-only" />
                                    </label>
                                    <p class="pl-1">atau seret dan lepaskan</p>
                                </div>
                                <p class="text-xs/5 text-gray-400">PNG, JPG, WEBP maks 10MB</p>
                            </div>
                        </div>
                    </div>

                    <div class="pb-4 mt-4">
                        <div class="mt-10 grid grid-cols-6 gap-x-6 gap-y-8">
                            <div class="col-span-3">
                                <label for="id_produk" class="block text-xl font-bold text-white">Id Produk</label>
                                <div class="mt-2">
                                    <input id="id_produk" type="text" name="id_produk"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500 sm:text-sm/6" />
                                </div>
                            </div>

                            <div class="col-span-3">
                                <label for="nama_produk" class="block text-xl font-bold text-white">Nama Produk</label>
                                <div class="mt-2">
                                    <input id="nama_produk" type="text" name="nama_produk"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500 sm:text-sm/6" />
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="deskripsi" class="block text-xl font-bold text-white">Deskripsi
                                    Produk</label>
                                <div class="mt-2">
                                    <textarea id="deskripsi" name="deskripsi" rows="3"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500 sm:text-sm/6"></textarea>
                                </div>
                            </div>

                            <div class="col-span-2">
                                <label for="skala" class="block text-xl font-bold text-white">Skala</label>
                                <div class="mt-2 grid grid-cols-1">
                                    <select id="skala" name="skala"
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white/5 py-1.5 pr-8 pl-3 text-base text-white outline-1 -outline-offset-1 outline-white/10 *:bg-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500 sm:text-sm/6">
                                        <option>1:64</option>
                                        <option>1:48</option>
                                        <option>1:32</option>
                                    </select>
                                    <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true"
                                        class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-400 sm:size-4">
                                        <path
                                            d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" fill-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>

                            <div class="col-span-2">
                                <label for="harga" class="block text-xl font-bold text-white">Harga</label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-blue-500">
                                        <div class="shrink-0 text-base text-gray-400 select-none sm:text-sm/6">
                                            Rp</div>
                                        <input id="harga" type="text" name="harga"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-2">
                                <label for="stok" class="block text-xl font-bold text-white">Stok</label>
                                <div class="mt-2">
                                    <input id="stok" type="text" name="stok" placeholder="Min Stok: 1"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500 sm:text-sm/6" />
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
                    class="rounded-md bg-green-500 px-3 py-2 text-xl font-bold text-white hover:bg-green-600">Simpan</button>
            </div>
        </form>
    </div>
@endsection
