@extends('template.service')
@section('title', 'Support Center')
@section('content')
    <h1 class="text-4xl italic font-bold font-archivo text-white text-center leading-tight p-8">
        @yield('hero_title', 'Support Center')
    </h1>
    <div class="flex gap-2 min-h-full flex-col justify-center px-6">
        <div class="max-w-4xl mx-auto px-4 pb-8">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Bagaimana Kami Bisa Membantu?</h2>
                <p class="mb-8">
                    Punya pertanyaan seputar pesanan, produk, atau akun? Tim Garage64 siap membantu pengalaman belanja
                    koleksimu agar tetap nyaman dan aman.
                </p>

                <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">FAQs</h2>
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg fill="#0091ff" width="20px" height="20px" viewBox="-5.5 0 19 19"
                                    xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg" stroke="#0091ff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M7.987 5.653a4.536 4.536 0 0 1-.149 1.213 4.276 4.276 0 0 1-.389.958 5.186 5.186 0 0 1-.533.773c-.195.233-.386.454-.568.658l-.024.026c-.17.18-.328.353-.468.516a3.596 3.596 0 0 0-.4.567 2.832 2.832 0 0 0-.274.677 3.374 3.374 0 0 0-.099.858v.05a1.03 1.03 0 0 1-2.058 0v-.05a5.427 5.427 0 0 1 .167-1.385 4.92 4.92 0 0 1 .474-1.17 5.714 5.714 0 0 1 .63-.89c.158-.184.335-.38.525-.579.166-.187.34-.39.52-.603a3.108 3.108 0 0 0 .319-.464 2.236 2.236 0 0 0 .196-.495 2.466 2.466 0 0 0 .073-.66 1.891 1.891 0 0 0-.147-.762 1.944 1.944 0 0 0-.416-.633 1.917 1.917 0 0 0-.62-.418 1.758 1.758 0 0 0-.723-.144 1.823 1.823 0 0 0-.746.146 1.961 1.961 0 0 0-1.06 1.062 1.833 1.833 0 0 0-.146.747v.028a1.03 1.03 0 1 1-2.058 0v-.028a3.882 3.882 0 0 1 .314-1.56 4.017 4.017 0 0 1 2.135-2.139 3.866 3.866 0 0 1 1.561-.314 3.792 3.792 0 0 1 1.543.314A3.975 3.975 0 0 1 7.678 4.09a3.933 3.933 0 0 1 .31 1.563zm-2.738 9.81a1.337 1.337 0 0 1 0 1.033 1.338 1.338 0 0 1-.71.71l-.005.003a1.278 1.278 0 0 1-.505.103 1.338 1.338 0 0 1-1.244-.816 1.313 1.313 0 0 1 .284-1.451 1.396 1.396 0 0 1 .434-.283 1.346 1.346 0 0 1 .526-.105 1.284 1.284 0 0 1 .505.103l.005.003a1.404 1.404 0 0 1 .425.281 1.28 1.28 0 0 1 .285.418z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-700">
                                    Apakah produk di Garage64 original?
                                    <br></br>
                                    Ya, seluruh produk yang dijual merupakan produk original dari brand terkait.
                                </p>
                                <hr class="my-4 border-blue-700">
                                <p class="text-sm text-blue-700">
                                    Berapa lama proses pengiriman?
                                    <br></br>
                                    Pesanan biasanya diproses dalam 1 sampai 3 hari kerja setelah pembayaran dikonfirmasi.
                                </p>
                                <hr class="my-4 border-blue-700">
                                <p class="text-sm text-blue-700">
                                    Apakah produk bisa diretur?
                                    <br></br>
                                    Retur dapat diajukan sesuai syarat dan ketentuan yang berlaku, disertai bukti unboxing.
                                </p>
                                <hr class="my-4 border-blue-700">
                                <p class="text-sm text-blue-700">
                                    Bagaimana cara melacak pesanan?
                                    <br></br>
                                    Nomor resi akan diberikan setelah pesanan dikirim dan dapat digunakan untuk tracking
                                    melalui ekspedisi terkait.
                                </p>
                                <hr class="my-4 border-blue-700">
                                <p class="text-sm text-blue-700">
                                    Apakah kondisi fisik diecast aman saat pengiriman?
                                    <br></br>
                                    Kami menggunakan packaging tambahan untuk membantu menjaga kondisi box dan produk tetap
                                    aman.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">
                        Contact Support
                    </h2>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Username
                                </label>

                                <input type="text" placeholder="Masukkan username"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3
                    focus:outline-none focus:ring-2 focus:ring-red-400
                    focus:border-red-400 transition">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Email
                                </label>

                                <input type="email" placeholder="your@email.com"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3
                    focus:outline-none focus:ring-2 focus:ring-red-400
                    focus:border-red-400 transition">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Subjek
                                </label>

                                <input type="text" placeholder="Contoh: Kendala Pesanan"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3
                    focus:outline-none focus:ring-2 focus:ring-red-400
                    focus:border-red-400 transition">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Keluhan
                                </label>

                                <textarea rows="5" placeholder="Tulis pertanyaan atau kendala Anda..."
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3
                    focus:outline-none focus:ring-2 focus:ring-red-400
                    focus:border-red-400 transition resize-none"></textarea>
                            </div>

                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white
                px-6 py-3 rounded-lg transition font-medium">
                                Kirim Pertanyaan
                            </button>

                        </form>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 mt-8">
                        Informasi Tambahan
                    </h2>
                    <p class="text-gray-600 my-6">
                        Email Support: support@garage64.com
                        <br></br>
                        Contact Center: +62 812-3456-7890 (24/7)
                    </p>
                    <p class="text-gray-600 mt-8">
                        <a href="#" class="hover:text-red-400 transition-colors">
                            Kembali ke atas
                        </a>
                    </p>
                </section>
            </div>
        </div>

        <a href="{{ url()->previous() }}"
            class="text-center text-white hover:text-red-200 hover:underline font-archivo italic text-xl pb-8">
            Tutup
        </a>
    </div>
@endsection
