@extends('template.service')
@section('title', 'Kebijakan Retur')
@section('content')
    <h1 class="text-4xl italic font-bold font-archivo text-white text-center leading-tight p-8">
        @yield('hero_title', 'Kebijakan Retur')
    </h1>
    <div class="flex gap-2 min-h-full flex-col justify-center px-6">
        <div class="max-w-4xl mx-auto px-4 pb-8">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <p class="mb-8">
                    Garage64 berkomitmen memberikan produk diecast berkualitas dan pelayanan terbaik bagi customer.
                </p>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">1. Syarat Retur</h2>
                    <p class="mb-8">
                        Retur atau komplain dapat diajukan apabila:
                    </p>
                    <div class="prose text-gray-600">
                        <ul class="list-disc list-inside space-y-2">
                            <li>
                                Produk yang diterima tidak sesuai pesanan
                            </li>
                            <li>
                                Produk mengalami kerusakan saat diterima
                            </li>
                            <li>
                                Terdapat kekurangan item pada pesanan
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">2. Ketentuan Pengajuan</h2>
                    <div class="prose text-gray-600">
                        <ul class="list-disc list-inside space-y-2">
                            <li>
                                Pengajuan retur wajib dilakukan maksimal 2x24 jam setelah paket diterima
                            </li>
                            <li>
                                Wajib menyertakan video unboxing tanpa jeda dan foto kondisi produk
                            </li>
                            <li>
                                Produk harus dalam kondisi lengkap beserta box dan aksesorisnya
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">3. Produk yang Tidak Dapat Diretur</h2>
                    <p class="mb-8">
                        Retur tidak berlaku untuk:
                    </p>
                    <div class="prose text-gray-600">
                        <ul class="list-disc list-inside space-y-2">
                            <li>
                                Kerusakan akibat kesalahan penggunaan oleh pembeli
                            </li>
                            <li>
                                Kerusakan minor dari pabrik seperti paint defect ringan atau kemasan penyok ringan
                            </li>
                            <li>
                                Produk yang sudah digunakan atau dimodifikasi
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">4. Proses Retur</h2>
                    <p class="mb-8">
                        Setelah pengajuan disetujui, Garage64 akan memberikan solusi berupa:
                    </p>
                    <div class="prose text-gray-600">
                        <ul class="list-disc list-inside space-y-2">
                            <li>
                                Penukaran produk
                            </li>
                            <li>
                                Refund
                            </li>
                            <li>
                                Store credit sesuai kondisi kasus
                            </li>
                        </ul>
                    </div>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">5. Kontak</h2>
                    <div class="bg-gray-50 rounded-lg p-6 flex items-center justify-between">
                        <p class="text-gray-600">Punya pertanyaan mengenai Kebijakan Retur atau yang lainnya?</p>
                        <a href="mailto:legal@example.com"
                            class="inline-flex items-center text-blue-600 hover:text-blue-500">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Contact Us
                        </a>
                    </div>
                    <p class="text-gray-600 mt-8">
                        <a href="#" class="hover:text-red-200 transition-colors">
                            Kembali ke atas
                        </a>
                    </p>
                </section>
            </div>
        </div>

        <a href="{{ url()->previous() }}"
            class="text-center text-white hover:text-red-200 font-archivo italic text-xl pb-8">
            Tutup
        </a>
    </div>
@endsection
