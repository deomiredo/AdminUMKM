<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penjual>
 */
class PenjualFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama'=>fake()->name(),
            
            'username'=>fake()->userName(),
            'no_hp'=>fake()->phoneNumber(),
            'pin'=>fake()->numberBetween(1,1000),
            'alamat'=>fake()->address(),
            'logo'=>asset('img/nopict.jpg'),
            'nama_toko'=>fake()->userName(),
            'nama_bank'=>fake()->name(),
            'no_rekening'=>fake()->name(),
            'atas_nama'=>fake()->name(),
            'deskripsi'=>fake()->sentence(10)
            
        ];
    }
}
