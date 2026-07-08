@extends('template.admin')
@section('title', 'Daftar Order')
@section('page_title', 'Order')
@section('content')
    <div class="flex flex-col gap-6">
        <h2 class="text-2xl font-bold text-white text-center">Daftar Order Masuk</h2>

        <!-- Complaint List -->
        <div class="overflow-x-auto text-white">
            <table class="min-w-full text-left text-sm whitespace-nowrap">
                <thead class="uppercase tracking-wider border-b-2 dark:border-neutral-600">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                            ID-Order
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Barang
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Jumlah
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Total Harga
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            Handbag
                        </th>
                        <td class="px-6 py-4">$129.99</td>
                        <td class="px-6 py-4">30</td>
                        <td class="px-6 py-4">In Stock</td>
                    </tr>

                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            Shoes
                        </th>
                        <td class="px-6 py-4">$89.50</td>
                        <td class="px-6 py-4">25</td>
                        <td class="px-6 py-4">In Stock</td>
                    </tr>

                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            Bedding Set
                        </th>
                        <td class="px-6 py-4">$69.99</td>
                        <td class="px-6 py-4">40</td>
                        <td class="px-6 py-4">In Stock</td>
                    </tr>

                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            Dining Table
                        </th>
                        <td class="px-6 py-4">$449.99</td>
                        <td class="px-6 py-4">5</td>
                        <td class="px-6 py-4">In Stock</td>
                    </tr>

                    <tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <th scope="row" class="px-6 py-4">
                            Soap Set
                        </th>
                        <td class="px-6 py-4">$24.95</td>
                        <td class="px-6 py-4">50</td>
                        <td class="px-6 py-4">In Stock</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
