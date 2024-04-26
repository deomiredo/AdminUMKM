<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_keranjang')->constrained('keranjang');
            $table->decimal('total_harga');
            $table->enum('status',['DIBATALKAN', 'BELUM DIBAYAR', 'MENUNGGU VERIFIKASI', 'MENUJU ALAMAT', 'SELESAI']);
            $table->enum('metode_pembayaran', ['COD', 'TRANSFER']);
            $table->text('bukti')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
