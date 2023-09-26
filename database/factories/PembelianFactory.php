<?php

namespace Database\Factories;

use App\Models\Pemasok;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembelian>
 */
class PembelianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_masuk' => 'P' .sprintf('%08d', fake()->unique()->numberBetween(1,99999999)),
            'tanggal_masuk'=> date('Y-m-d'),
            'total'=>fake()->numberBetween(1000,100000),
            'pemasok_id'=>fake()->randomElement(Pemasok::select('id')->get()),
            'user_id'=> '1'
        ];
    }
}
