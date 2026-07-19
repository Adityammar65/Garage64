@extends('template.admin')

@section('title', 'Laporan')
@section('page_title', 'Laporan')

@section('content')

    <div class="flex flex-col gap-6 p-4">
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">

            {{-- Filter --}}
            <div class="flex items-center gap-3">

                <select id="filter" name="filter"
                    class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500">

                    <option value="week" {{ $filter == 'week' ? 'selected' : '' }}>
                        Minggu Ini
                    </option>

                    <option value="month" {{ $filter == 'month' ? 'selected' : '' }}>
                        Bulan Ini
                    </option>

                    <option value="year" {{ $filter == 'year' ? 'selected' : '' }}>
                        Tahun Ini
                    </option>

                </select>

                <button id="btnRefresh" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg transition">

                    Refresh

                </button>

            </div>

        </div>

        {{-- Summary --}}
        <div id="summary">

            @include('admin.partials.summary')

        </div>

        {{-- Penjualan --}}
        <div id="penjualan">

            @include('admin.partials.penjualan')

        </div>

        {{-- Keuangan --}}
        <div id="keuangan">

            @include('admin.partials.keuangan')

        </div>

    </div>

@endsection


@section('script')

    <script>
        function loadReport(filter = 'month') {

            $.ajax({

                url: "{{ url('/admin/laporan') }}",

                type: "GET",

                data: {

                    filter: filter

                },

                beforeSend: function() {

                    $("#summary").css("opacity", ".5");

                    $("#penjualan").css("opacity", ".5");

                    $("#keuangan").css("opacity", ".5");

                },

                success: function(response) {

                    $("#summary").html(response.summary);

                    $("#penjualan").html(response.penjualan);

                    $("#keuangan").html(response.keuangan);

                },

                complete: function() {

                    $("#summary").css("opacity", "1");

                    $("#penjualan").css("opacity", "1");

                    $("#keuangan").css("opacity", "1");

                }

            });

        }

        $("#filter").on("change", function() {

            loadReport($(this).val());

        });

        $("#btnRefresh").on("click", function() {

            loadReport($("#filter").val());

        });
    </script>

@endsection
