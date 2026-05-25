@extends('template.auth')
@section('title', 'Syarat dan Ketentuan')
@section('content')
    <div class="flex gap-2 min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="max-w-4xl mx-auto px-4 py-16">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-8">Syarat dan Ketentuan</h1>
                <p class="mb-8">
                    Selamat datang di Garage64. Dengan mengakses dan menggunakan website ini, Anda dianggap telah membaca,
                    memahami, dan menyetujui seluruh syarat dan ketentuan berikut.
                </p>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">1. Ketentuan Umum</h2>
                    <div class="prose text-gray-600">
                        <ul class="list-disc list-inside space-y-2">
                            <li>
                                Garage64 merupakan platform e-commerce yang menyediakan produk diecast dan koleksi otomotif.
                            </li>
                            <li>
                                Seluruh pengguna wajib menggunakan website dengan itikad baik dan tidak melanggar hukum yang
                                berlaku.
                            </li>
                            <li>
                                Garage64 berhak mengubah, memperbarui, atau menyesuaikan syarat dan ketentuan sewaktu-waktu
                                tanpa pemberitahuan sebelumnya.
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">2. Akun Pengguna</h2>
                    <div class="prose text-gray-600">
                        <ul class="list-disc list-inside space-y-2">
                            <li>
                                Pengguna bertanggung jawab atas keamanan akun dan kerahasiaan data login. </li>
                            <li>
                                Informasi yang diberikan saat registrasi harus benar dan valid.
                            </li>
                            <li>
                                Garage64 berhak menangguhkan atau menghapus akun yang terbukti melakukan pelanggaran,
                                penipuan, atau aktivitas mencurigakan.
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">3. Disclaimer</h2>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    Informasi dan produk yang tersedia pada website ini disediakan sebagaimana adanya.
                                    Garage64 tidak menjamin bahwa seluruh gambar, warna, deskripsi, atau kemasan
                                    produk akan selalu identik 100% karena adanya perubahan dari produsen, pencahayaan foto,
                                    maupun perbedaan tampilan layar pengguna.
                                    <br></br>
                                    Seluruh produk diecast yang dijual ditujukan untuk koleksi dan display. Garage64 tidak
                                    bertanggung jawab atas kerusakan akibat kesalahan penggunaan, keterlambatan pengiriman
                                    dari pihak ekspedisi, maupun keadaan di luar kendali kami.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">4. Batasan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="font-medium text-gray-900 mb-2">Kondisi Produk</h3>
                            <p class="text-gray-600">
                                Perbedaan minor pada kemasan, detail cat, atau cacat produksi pabrik
                                dapat terjadi sesuai standar produksi masing-masing brand.
                            </p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="font-medium text-gray-900 mb-2">Tanggung Jawab</h3>
                            <p class="text-gray-600">
                                Garage64 tidak bertanggung jawab atas kerugian tidak langsung,
                                keterlambatan pengiriman, atau kerusakan yang disebabkan oleh layanan pihak ketiga.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">5. Revisi</h2>
                    <div class="prose text-gray-600">
                        <p>
                            Garage64 dapat mengubah atau memperbarui syarat layanan ini kapan saja tanpa pemberitahuan
                            sebelumnya. Dengan tetap menggunakan website ini, pengguna dianggap menyetujui versi terbaru
                            dari ketentuan yang berlaku.
                        </p>
                    </div>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">6. Kontak</h2>
                    <div class="bg-gray-50 rounded-lg p-6 flex items-center justify-between">
                        <p class="text-gray-600">Punya pertanyaan mengenai Syarat Layanan atau Disclaimer?</p>
                        <a href="mailto:legal@example.com"
                            class="inline-flex items-center text-blue-600 hover:text-blue-500">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Contact Us
                        </a>
                    </div>
                </section>
            </div>
        </div>

        <a href="{{ url('/register') }}" class="text-center text-green-400 hover:text-green-300 font-semibold">
            Kembali ke Halaman Register
        </a>
    </div>
@endsection
