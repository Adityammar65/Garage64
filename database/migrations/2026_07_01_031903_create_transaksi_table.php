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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');

            $table->foreignId('id_user')
                ->constrained('users','id_user')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->unsignedInteger('total_qty');

            $table->decimal('total_harga', 12, 2);

            $table->text('alamat_tujuan');

            $table->text('catatan')->nullable();

            $table->string('metode_bayar')->nullable();

            $table->enum('status', [
                'diproses',
                'dikirim',
                'selesai',
                'dibatalkan'
            ])->default('diproses');

            $table->string('resi')->nullable();

            $table->timestamp('dibayar_pada')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
