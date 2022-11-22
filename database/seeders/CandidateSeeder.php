<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 5,
                'birthday' => '2000-01-01',
                'address' => '{"provinsi":"34","kota":"3471","kecamatan":"3471050","kelurahan":"3471050003","jalan":"Jl. Retno Dumilah No.64"}',
                'about' => 'Saya adalah programmer backend dan frontend',
                'skill_id' => 3,
                'skill' => '["PHP, Native CSS, Native JS","Laravel","Tailwind CSS","Alpine JS","jQuery"]',
                'education' => '{"2":{"name":"Sekolah Dasar","location":"Second Tokiwadaira Elementary School","from":"2009-04","to":"2011-04"},"1":{"name":"Sekolah Menengah Pertama","location":"Kanegasaku Junior High School","from":"2011-04","to":"2014-04"},"0":{"name":"Sekolah Menegah Atas","location":"SMAN 1 Tambun Selatan","from":"2014-04","to":"2017-04"}}',
                'certificate' => '[{"title":"JLPT N1","get":"2017-12"},{"title":"JLPT N2","get":"2019-12"}]',
                'experience' => '[{"title":"Programmer","location":"SEVEN INC., Yogyakarta","from":"2022-09","to":"2022-01"}]',
                'tos' => 1,
                'submitted_at' => date('Y-m-d h:i:s', time()),
                'approved_at' => date('Y-m-d h:i:s', time() + 86400),
                'created_at' => date('Y-m-d h:i:s', time() + 1),
                'updated_at' => date('Y-m-d h:i:s', time() + 1),
            ]
        ];

        Candidate::insert($data);
    }
}
