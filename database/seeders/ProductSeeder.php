<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
                'name' => 'Paket Pasang Lowongan',
                'description' => 'Tipe Gold',
                'price' => 100,
                'promo' => 10,
                'promo_status' => 0,
                'total' => 100,
            ],
            [
                'name' => 'Paket Pasang Lowongan',
                'description' => 'Tipe Silver',
                'price' => 100,
                'promo' => 10,
                'promo_status' => 0,
                'total' => 100,
            ],
            [
                'name' => 'Paket Pasang Lowongan',
                'description' => 'Tipe Bronze',
                'price' => 100,
                'promo' => 10,
                'promo_status' => 0,
                'total' => 100,
            ],
            [
                'name' => 'Cari Kandidat',
                'description' => 'Kandidat Novice',
                'price' => 100,
                'promo' => 10,
                'promo_status' => 0,
                'total' => 100,
            ],
            [
                'name' => 'Cari Kandidat',
                'description' => 'Kandidat Competent',
                'price' => 100,
                'promo' => 10,
                'promo_status' => 0,
                'total' => 100,
            ],
            [
                'name' => 'Cari Kandidat',
                'description' => 'Kandidat Expert',
                'price' => 100,
                'promo' => 10,
                'promo_status' => 0,
                'total' => 100,
            ],
            [
                'name' => 'Cari Kandidat',
                'description' => 'Kandidat Expert',
                'price' => 100,
                'promo' => 10,
                'promo_status' => 0,
                'total' => 100,
            ],
            [
                'name' => 'Lihat Kandidat',
                'description' => 'Kandidat Novice',
                'price' => 100,
                'promo' => 10,
                'promo_status' => 0,
                'total' => 100,
            ],
            [
                'name' => 'Lihat Kandidat',
                'description' => 'Kandidat Competent',
                'price' => 100,
                'promo' => 10,
                'promo_status' => 0,
                'total' => 100,
            ],
            [
                'name' => 'Lihat Kandidat',
                'description' => 'Kandidat Proficient',
                'price' => 100,
                'promo' => 10,
                'promo_status' => 0,
                'total' => 100,
            ],
            [
                'name' => 'Lihat Kandidat',
                'description' => 'Kandidat Expert',
                'price' => 100,
                'promo' => 10,
                'promo_status' => 0,
                'total' => 100,
            ],
            [
                'name' => 'Lihat Kandidat',
                'description' => 'Kandidat Master',
                'price' => 100,
                'promo' => 10,
                'promo_status' => 0,
                'total' => 100,
            ],
        ];

        Product::insert($data);
    }
}
