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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->longText('deskripsi');
            $table->text('gambar');
            $table->decimal('harga',$total=10);
            $table->integer('stok')->default(0);
            $table->foreignId('id_kategori_produk')->constrained('kategori_produk');
            $table->foreignId('id_penjual')->constrained('penjual');
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
        Schema::dropIfExists('produks');
    }
};
