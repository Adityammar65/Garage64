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
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id('id_detail');
        
            $table->foreignId('id_transaksi')
                ->constrained('transaksis', 'id_transaksi')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        
            $table->foreignId('id_produk')
                ->constrained('produks', 'id_produk')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        
            $table->integer('jumlah_qty');
            $table->decimal('total_harga', 12, 2);
        
            $table->string('status_pembayaran');
            $table->dateTime('tanggal');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
