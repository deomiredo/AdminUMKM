<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_produk'=>fake()->name,
            'deskripsi'=>fake()->sentence(10),
            'id_penjual'=>rand(1,11),
            'id_kategori_produk'=>rand(1,3),
            'harga'=>rand(500,10000),
            'stok'=>rand(10 ,100),
            'gambar'=>asset('img/nopict.jpg'),
        ];
    }
}
