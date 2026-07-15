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
        Schema::table('transaksi', function (Blueprint $table) {
            $table->string('order_id')
                ->unique()
                ->after('id_user');

            $table->string('transaction_id')
                ->nullable()
                ->after('order_id');

            $table->string('snap_token')
                ->nullable()
                ->after('transaction_id');

            $table->string('payment_type')
                ->nullable()
                ->after('snap_token');

            $table->string('payment_status')
                ->default('pending')
                ->after('payment_type');

            $table->timestamp('expired_at')
                ->nullable()
                ->after('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            //
        });
    }
};
