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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id('id_keranjang');

            $table->foreignId('id_user')
                ->constrained('users','id_user')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('id_produk')
                ->constrained('produk','id_produk')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->unsignedInteger('jumlah');

            $table->decimal('subtotal', 12, 2);

            $table->unique([
                'id_user',
                'id_produk'
            ]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
