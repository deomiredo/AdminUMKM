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
        Schema::create('penjual', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('no_hp')->unique();
            $table->string('pin');
            $table->string('alamat');
            $table->text('logo');
            $table->string('nama_toko')->unique();
            $table->string('nama_bank');
            $table->string('no_rekening');
            $table->string('atas_nama');
            $table->longText('deskripsi')->nullable();
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
        Schema::dropIfExists('penjuals');
    }
};
