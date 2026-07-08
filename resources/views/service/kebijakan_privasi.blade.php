@extends('template.service')
@section('title', 'Kebijakan Privasi')
@section('content')
    <h1 class="text-4xl italic font-bold font-archivo text-white text-center leading-tight p-8">
        @yield('hero_title', 'Kebijakan Privasi')
    </h1>
    <div class="flex gap-2 min-h-full flex-col justify-center px-6">
        <div class="max-w-4xl mx-auto px-4 pb-8">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <p class="mb-8">
                    Garage64 menghargai dan melindungi privasi setiap pengguna website kami. Dengan menggunakan layanan
                    Garage64, Anda menyetujui pengumpulan dan penggunaan informasi sesuai dengan kebijakan ini.
                </p>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">1. Informasi yang Dikumpulkan</h2>
                    <p class="mb-8">
                        Kami dapat mengumpulkan informasi seperti:
                    </p>
                    <div class="prose text-gray-600">
                        <ul class="list-disc list-inside space-y-2">
                            <li>
                                Nama Pengguna
                            </li>
                            <li>
                                Alamat Email
                            </li>
                            <li>
                                Nomor Telepon
                            </li>
                            <li>
                                Alamat Pengiriman
                            </li>
                            <li>
                                Informasi Transaksi dan Pembayaran
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">2. Penggunaan Informasi</h2>
                    <p class="mb-8">
                        Informasi yang dikumpulkan digunakan untuk:
                    </p>
                    <div class="prose text-gray-600">
                        <ul class="list-disc list-inside space-y-2">
                            <li>
                                Memproses pesanan dan pengiriman
                            </li>
                            <li>
                                Memberikan layanan customer support
                            </li>
                            <li>
                                Mengirim informasi promo atau update produk
                            </li>
                            <li>
                                Meningkatkan pengalaman pengguna pada website
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">3. Keamanan Data</h2>
                    <p class="mb-8">
                        Garage64 berkomitmen menjaga keamanan data pengguna dan menggunakan langkah perlindungan yang wajar
                        untuk mencegah akses tidak sah.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">4. Kerahasiaan Informasi</h2>
                    <p class="mb-8">
                        Kami tidak menjual, menyewakan, atau membagikan data pribadi pengguna kepada pihak lain tanpa
                        persetujuan pengguna, kecuali diwajibkan oleh hukum.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">5. Perubahan Kebijakan</h2>
                    <p class="mb-8">
                        Garage64 dapat memperbarui Kebijakan Privasi sewaktu-waktu tanpa pemberitahuan sebelumnya.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">6. Kontak</h2>
                    <div class="bg-gray-50 rounded-lg p-6 flex items-center justify-between">
                        <p class="text-gray-600">Punya pertanyaan mengenai Kebijakan Privasi atau yang lainnya?</p>
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
