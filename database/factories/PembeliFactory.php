<?php

namespace Database\Factories;

use App\Models\Pembeli;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembeli>
 */
class PembeliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pembeli::class;
    public function definition()
    {
        return [
            'nama_lengkap'=> fake()->name(),
            'username'=>fake()->userName(),
            'no_hp'=>fake()->phoneNumber(),
            'password'=>fake()->numberBetween(1,1000),
            'alamat'=>fake()->address(),
            'verifikasi'=>true,
            'foto'=>asset('img/default-profile.jpg'),
            'deskripsi'=>fake()->sentence(10)
        ];
    }
}
