<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' =>$this->faker->randomElement([
                'terigu segitiga',
                'terigu dahlia',
                'terigu tulip',
                'aci menara',
                'aci gunung',
                'aci terompet'
            ]),
            'stok' =>$this->faker->numberBetween(0,500),
            'satuan_ecer' =>$this->faker->randomElement(['pcs', 'kg']),
            'harga_ecer' =>$this->faker->numberBetween(5000,50000),
            'satuan_grosir' =>$this->faker->randomElement(['dus', 'karung']),
            'harga_grosir' =>$this->faker->numberBetween(5000,200000),
        ];
    }
}
