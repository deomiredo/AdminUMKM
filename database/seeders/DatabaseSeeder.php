<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KategoriProduk;
use App\Models\Pembeli;
use App\Models\Penjual;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'fullName'=>'Admin UMKM',
            'name' => 'admin',
            'password'=>bcrypt('password')
        ]);

        KategoriProduk::create([
            'nama_kategori'=>'Makanan'
        ]);
        KategoriProduk::create([
            'nama_kategori'=>'Minuman'
        ]);
        KategoriProduk::create([
            'nama_kategori'=>'Bahan Pokok'
        ]);

        Pembeli::factory()->count(10)->create();
        Penjual::factory()->count(10)->create();
    }
}
