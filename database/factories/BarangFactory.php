<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
         'kode_barang' => 'K' .sprintf('%08d',fake()->unique()->numberBetween(1,99999999)),
         'produk_id' =>fake()->randomElement(Produk::select('id')->get()),
         'nama_barang' => fake()->randomElement(['Bimoli','Mie Sedap Ayam','Indomie Goreng','Sabun Lifebuoy']),
         'satuan' => fake()->randomElement(['pcs','item','lusin']),
         'harga_jual'=>fake()->numberBetween(1000,1000000),
         'stok'=>fake()->numberBetween(1,1000),
         'user_id'=>'1'


        ];
    }
}
