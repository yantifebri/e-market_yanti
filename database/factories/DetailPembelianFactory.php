<?php

namespace Database\Factories;

use App\Models\barang;
use App\Models\Pembelian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailPembelian>
 */
class DetailPembelianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            $idBeli = fake()->randomElement(Pembelian::select('id')->get());
            $idBarang = fake()->randomElement(barang::select('id')->get());
            $data = barang::select('harga_jual')->where('id', $idBarang)->first();
            
        ];
    }
}
