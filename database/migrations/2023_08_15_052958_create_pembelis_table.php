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
        Schema::create('pembeli', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap')->unique();
            $table->string('username')->unique();
            $table->string('no_hp')->unique();
            $table->string('password');
            $table->enum('verifikasi', ['true', 'false']);
            $table->text('foto')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelis');
    }
};
