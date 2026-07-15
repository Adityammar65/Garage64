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
        Schema::create('services', function (Blueprint $table) {
            $table->id('id_service');

            $table->unsignedBigInteger('id_user');

            $table->string('subjek');
            $table->text('pesan');

            $table->enum('status', [
                'menunggu',
                'diproses',
                'selesai',
                'ditolak'
            ])->default('menunggu');

            $table->text('balasan')->nullable();

            $table->timestamp('dibalas_pada')->nullable();

            $table->timestamps();

            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};