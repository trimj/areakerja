<?php

namespace Database\Seeders;

use App\Models\JobVacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobVacancySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'partner_id' => 1,
                'title' => 'Web Developer (Backend)',
                'slug' => 'web-developer-backend',
                'description' => '[ul]
[li]Laravel 9[/li]
[li]PHP Backend/Fullstack Experiences[/li]
[li]Alpine JS[/li]
[li]jQuery[/li]
[li]Native JS[/li]
[/ul]',
                'mainSkill' => 3,
                'otherSkill' => null,
                'address' => '{"provinsi":"34","kota":"3402","kecamatan":"3402130","kelurahan":"3402130008"}',
                'minSalary' => 1500000,
                'maxSalary' => 5500000,
                'deadline' => date('Y-m-d H:i', time() + (86400 * 7)),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ],
            [
                'partner_id' => 1,
                'title' => 'Web Developer (Frontend)',
                'slug' => 'web-developer-frontend',
                'description' => '[ul]
[li]Native CSS & JS[/li]
[li]Framework CSS & JS (Tailwind CSS/Alpine JS/dll)[/li]
[li]jQuery[/li]
[/ul]',
                'mainSkill' => 8,
                'otherSkill' => null,
                'address' => '{"provinsi":"34","kota":"3402","kecamatan":"3402130","kelurahan":"3402130008"}',
                'minSalary' => 1000000,
                'maxSalary' => 5000000,
                'deadline' => date('Y-m-d H:i', time() + (86400 * 7)),
                'created_at' => date('Y-m-d h:i:s', time() + 1),
                'updated_at' => date('Y-m-d h:i:s', time() + 1),
            ],
            [
                'partner_id' => 2,
                'title' => 'Web Programmer Backend',
                'slug' => 'web-programmer-backend',
                'description' => '[ul]
[li]Laravel 9[/li]
[li]PHP Backend/Fullstack Experiences[/li]
[li]Alpine JS[/li]
[li]jQuery[/li]
[li]Native JS[/li]
[/ul]',
                'mainSkill' => 3,
                'otherSkill' => null,
                'address' => '{"provinsi":"32","kota":"3216","kecamatan":"3216100","kelurahan":"3216100001"}',
                'minSalary' => 1500000,
                'maxSalary' => 6000000,
                'deadline' => date('Y-m-d H:i', time() + (86400 * 14)),
                'created_at' => date('Y-m-d h:i:s', time() + 2),
                'updated_at' => date('Y-m-d h:i:s', time() + 2),
            ],
        ];

        JobVacancy::insert($data);
    }
}
