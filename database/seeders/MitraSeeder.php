<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Added
use App\Models\Partner;

class MitraSeeder extends Seeder
{
    public function run()
    {
        $data = [
            //1
            [
                'user_id' => 4,
                'coins' => 2,
                'description' => 'Seven Inc membuka kesempatan buat Kamu yang ingin menjajal pengalaman kerja di bisnis yang dijalankan Seven Inc',
                'phone' => '89529002944',
                'email' => 'mail@magangjogja.com',
                'website' => 'https://magangjogja.com/',
                'address' => '{"provinsi":"34","kota":"3402","kecamatan":"3402130","kelurahan":"3402130008","jalan":"Jl. Janti Gg. Arjuna No. 59, Karangjambe"}',
                'tos' => 1,
                'submitted_at' => date('Y-m-d h:i:s', time()),
                'approved_at' => date('Y-m-d h:i:s', time()),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ],
            //2
            [
                'user_id' => 11,
                'coins' => 0,
                'description' => 'Universitas Esa Unggul (UEU) didirikan pada tahun 1993 di bawah naungan Yayasan Pendidikan Kemala Bangsa adalah Perguruan Tinggi Swasta terkemuka dan menjadi salah satu Universitas Swasta terbaik di Indonesia.',
                'phone' => '81390075454',
                'email' => 'kampusbekasi@esaunggul.ac.id',
                'website' => 'https://www.esaunggul.ac.id',
                'address' => '{"provinsi":"32","kota":"3216","kecamatan":"3216100","kelurahan":"3216100001","jalan":"Jl. Harapan Indah Boulevard No. 2"}',
                'tos' => 1,
                'submitted_at' => date('Y-m-d h:i:s', time()),
                'approved_at' => date('Y-m-d h:i:s', time()),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ]
        ];

        Partner::insert($data);
    }
}
