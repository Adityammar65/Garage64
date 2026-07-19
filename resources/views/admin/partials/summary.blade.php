<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

    {{-- Total Order --}}
    <div class="bg-gray-800 border border-gray-700 rounded-xl p-6 shadow-lg">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-gray-400 text-sm">
                    Total Order
                </p>

                <h2 class="text-3xl font-bold text-white mt-2">

                    {{ number_format($totalOrder) }}

                </h2>

            </div>

            <div class="w-12 h-12 rounded-xl bg-red-500/20 flex items-center justify-center">

                <i class="fa-solid fa-cart-shopping text-red-500 text-xl"></i>

            </div>

        </div>

    </div>


    {{-- Produk Terjual --}}
    <div class="bg-gray-800 border border-gray-700 rounded-xl p-6 shadow-lg">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-gray-400 text-sm">
                    Produk Terjual
                </p>

                <h2 class="text-3xl font-bold text-red-500 mt-2">

                    {{ number_format($produkTerjual) }}

                </h2>

            </div>

            <div class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center">

                <i class="fa-solid fa-box-open text-blue-400 text-xl"></i>

            </div>

        </div>

    </div>


    {{-- Pendapatan --}}
    <div class="bg-gray-800 border border-gray-700 rounded-xl p-6 shadow-lg">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-gray-400 text-sm">
                    Pendapatan
                </p>

                <h2 class="text-3xl font-bold text-green-400 mt-2">

                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}

                </h2>

            </div>

            <div class="w-12 h-12 rounded-xl bg-green-500/20 flex items-center justify-center">

                <i class="fa-solid fa-wallet text-green-400 text-xl"></i>

            </div>

        </div>

    </div>


    {{-- Average --}}
    <div class="bg-gray-800 border border-gray-700 rounded-xl p-6 shadow-lg">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-gray-400 text-sm">
                    Rata-rata Order
                </p>

                <h2 class="text-3xl font-bold text-yellow-400 mt-2">

                    Rp {{ number_format($averageOrder, 0, ',', '.') }}

                </h2>

            </div>

            <div class="w-12 h-12 rounded-xl bg-yellow-500/20 flex items-center justify-center">

                <i class="fa-solid fa-chart-line text-yellow-400 text-xl"></i>

            </div>

        </div>

    </div>

</div>
