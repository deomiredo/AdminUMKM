<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KategoriProduk;
use App\Models\Pembeli;
use App\Models\Penjual;
use App\Models\Produk;
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
            'fullName' => 'Admin UMKM',
            'name' => 'admin',
            'password' => bcrypt('password')
        ]);

        KategoriProduk::create([
            'nama_kategori' => 'Makanan'
        ]);
        KategoriProduk::create([
            'nama_kategori' => 'Minuman'
        ]);
        KategoriProduk::create([
            'nama_kategori' => 'Bahan Pokok'
        ]);
        Pembeli::create([
            'nama_lengkap' => 'Adii',
            'username' => 'adi',
            'no_hp' => '08123',
            'password' => '123',
            'alamat' => 'jl apa aja',
            'verifikasi' => true,
            'deskripsi' => fake()->sentence(10)
        ]);
        $penjual = Penjual::create([
            'nama' => 'Penjual',
            'username' => 'penjual',
            'no_hp' => '081',
            'pin' => '123',
            'alamat' => 'Penjual',
            'logo' => asset('img/nopict.jpg'),
            'nama_toko' => 'Palem',
            'nama_bank' => 'BCA',
            'no_rekening' => '2012',
            'atas_nama' => 'RO',
            'deskripsi' => 'HARI AIN',
        ]);

        KategoriProduk::factory()->count(3)->create();
        Pembeli::factory()->count(10)->create();
        Penjual::factory()->count(10)->create();
        Produk::factory()->count(10)->create();
    }
}
