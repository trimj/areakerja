<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'price' => 10000,
                'type' => 'coin'
            ],
            [
                'price' => 10000,
                'type' => 'pelatihan'
            ],
        ];

        Price::insert($data);
    }
}
