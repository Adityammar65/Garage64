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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');

            $table->string('kode_produk')->unique();

            $table->foreignId('id_kategori')
                ->constrained('kategori','id_kategori')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('nama_produk');

            $table->string('brand');

            $table->string('skala');

            $table->text('deskripsi');

            $table->string('gambar');

            $table->decimal('harga', 12, 2);

            $table->unsignedInteger('stok');

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
