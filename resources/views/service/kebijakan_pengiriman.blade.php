@extends('template.service')
@section('title', 'Kebijakan Pengiriman')
@section('content')
    <h1 class="text-4xl italic font-bold font-archivo text-white text-center leading-tight p-8">
        @yield('hero_title', 'Kebijakan Pengiriman')
    </h1>
    <div class="flex gap-2 min-h-full flex-col justify-center px-6">
        <div class="max-w-4xl mx-auto px-4 pb-8">
            <div class="bg-white rounded-2xl shadow-xl p-8 transition-shadow duration-300 hover:shadow-2xl">
                <p class="mb-8 text-gray-600 leading-relaxed">
                    Garage64 memastikan setiap pesanan dikemas dengan aman untuk menjaga kualitas koleksi pelanggan.
                </p>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-l-4 border-gray-800 pl-3">
                        1. Proses Pengiriman
                    </h2>
                    <div class="prose text-gray-600">
                        <ul class="list-disc list-inside space-y-2 marker:text-gray-400">
                            <li class="transition-colors duration-200 hover:text-gray-800">
                                Pesanan diproses setelah pembayaran berhasil dikonfirmasi
                            </li>
                            <li class="transition-colors duration-200 hover:text-gray-800">
                                Estimasi proses packing 1 sampai 3 hari kerja
                            </li>
                            <li class="transition-colors duration-200 hover:text-gray-800">
                                Pengiriman dilakukan melalui jasa ekspedisi yang tersedia pada sistem
                            </li>
                            <li class="transition-colors duration-200 hover:text-gray-800">
                                Pesanan dikirim pada hari kerja (Maksimal pukul 16.00 WIB), termasuk hari libur
                                nasional dan akhir pekan (Maksimal pukul 12.00 WIB)
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-l-4 border-gray-800 pl-3">
                        2. Packaging
                    </h2>
                    <p class="mb-4 text-gray-600 leading-relaxed">
                        Kami menggunakan packaging tambahan untuk membantu melindungi:
                    </p>
                    <div class="prose text-gray-600">
                        <ul class="list-disc list-inside space-y-2 marker:text-gray-400">
                            <li class="transition-colors duration-200 hover:text-gray-800">
                                Box diecast
                            </li>
                            <li class="transition-colors duration-200 hover:text-gray-800">
                                Blister packaging
                            </li>
                            <li class="transition-colors duration-200 hover:text-gray-800">
                                Display dan aksesoris produk
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-l-4 border-gray-800 pl-3">
                        3. Estimasi Pengiriman
                    </h2>
                    <p class="mb-8 text-gray-600 leading-relaxed">
                        Waktu pengiriman mengikuti kebijakan dan performa pihak ekspedisi. Keterlambatan akibat pihak
                        ketiga di luar tanggung jawab Garage64.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-l-4 border-gray-800 pl-3">
                        4. Resiko Pengiriman
                    </h2>
                    <p class="mb-8 text-gray-600 leading-relaxed">
                        Garage64 akan memastikan produk dikemas dengan baik sebelum dikirim. Namun, kerusakan akibat
                        proses pengiriman oleh ekspedisi dapat diajukan melalui komplain sesuai syarat yang berlaku.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-l-4 border-gray-800 pl-3">
                        5. Informasi Resi
                    </h2>
                    <p class="mb-8 text-gray-600 leading-relaxed">
                        Nomor resi akan diberikan setelah pesanan berhasil diproses dan dikirim.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-l-4 border-gray-800 pl-3">
                        6. Kontak
                    </h2>
                    <div class="bg-gray-50 rounded-lg p-6 flex items-center justify-between transition-colors duration-200 hover:bg-gray-100">
                        <p class="text-gray-600">Punya pertanyaan mengenai Kebijakan Pengiriman atau yang lainnya?</p>
                        <a href="mailto:legal@example.com"
                            class="inline-flex items-center text-blue-600 hover:text-blue-500 transition-colors duration-200 font-medium">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Contact Us
                        </a>
                    </div>
                    <p class="text-gray-600 mt-8 text-center">
                        <a href="#" class="hover:text-red-200 transition-colors duration-200 underline underline-offset-4">
                            Kembali ke atas
                        </a>
                    </p>
                </section>
            </div>
        </div>

        <a href="{{ url()->previous() }}"
            class="text-center text-white hover:text-red-200 font-archivo italic text-xl pb-8 transition-colors duration-200">
            Tutup
        </a>
    </div>
@endsection