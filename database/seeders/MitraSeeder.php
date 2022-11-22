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
            [
                'user_id' => 4,
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
            ]
        ];

        Partner::insert($data);
    }
}
