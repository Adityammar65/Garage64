<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .alert {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
        }

        th {
            background: #2563eb;
            color: white;
            padding: 15px;
            text-align: center;
        }

        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }


        tr {
            transition: 0.3s;
        }


        tbody tr:hover {
            background: #eff6ff;
            transform: scale(1.01);
        }


        .btn {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: 0.3s;
        }


        .btn-plus {
            background: #16a34a;
        }


        .btn-plus:hover {
            background: #15803d;
            transform: scale(1.1);
        }


        .btn-minus {
            background: #f59e0b;
        }


        .btn-minus:hover {
            background: #d97706;
            transform: scale(1.1);
        }


        .btn-hapus {
            background: #dc2626;
        }


        .btn-hapus:hover {
            background: #991b1b;
            transform: scale(1.1);
        }


        .jumlah {
            font-size: 18px;
            font-weight: bold;
            margin: 0 10px;
        }


        .total {
            margin-top: 25px;
            text-align: right;
            font-size: 22px;
            font-weight: bold;
            color: #2563eb;
        }


        .checkout {
            margin-top: 20px;
            text-align: right;
        }


        .btn-checkout {
            background: #2563eb;
            padding: 12px 25px;
            border-radius: 10px;
            color:white;
            text-decoration:none;
            font-weight:bold;
            transition:0.3s;
        }


        .btn-checkout:hover {
            background:#1d4ed8;
            box-shadow:0 5px 15px rgba(37,99,235,.4);
        }


    </style>

</head>


<body>


<div class="container">


<h2>
🛒 Keranjang Belanja
</h2>



@if(session('success'))

<div class="alert">
{{ session('success') }}
</div>

@endif



<table>


<thead>

<tr>

<th>Produk</th>
<th>Harga</th>
<th>Jumlah</th>
<th>Subtotal</th>
<th>Aksi</th>

</tr>

</thead>



<tbody>


@php
$total = 0;
@endphp



@foreach($keranjang as $item)


@php
$total += $item->subtotal;
@endphp



<tr>


<td>
{{ $item->produk->nama_produk }}
</td>



<td>
Rp {{ number_format($item->produk->harga) }}
</td>



<td>


<a class="btn btn-minus"
href="/keranjang/kurang/{{ $item->id }}">
-
</a>


<span class="jumlah">
{{ $item->jumlah }}
</span>


<a class="btn btn-plus"
href="/keranjang/tambah/{{ $item->id }}">
+
</a>


</td>



<td>
Rp {{ number_format($item->subtotal) }}
</td>



<td>


<a class="btn btn-hapus"
href="/keranjang/hapus/{{ $item->id }}"
onclick="return confirm('Hapus produk ini?')">
Hapus
</a>


</td>


</tr>


@endforeach



</tbody>


</table>



<div class="total">

Total :
Rp {{ number_format($total) }}

</div>



<div class="checkout">

<a href="#" class="btn-checkout">
Checkout
</a>

</div>



</div>


</body>
</html>