<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {

            $table->id('id_produk');

            $table->string('nama_produk');

            $table->string('brand_produk');

            $table->string('skala_produk');

            $table->text('deskripsi_produk');

            $table->string('gambar_produk');

            $table->decimal('harga', 12, 2);

            $table->integer('stok');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
