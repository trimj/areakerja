<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Added
use App\Models\SkillList;

class SkillSeeder extends Seeder
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
                "name" => "Administrasi",
            ],
            [
                "name" => "Animasi",
            ],
            [
                "name" => "Backend Programmer",
            ],
            [
                "name" => "Content Planner",
            ],
            [
                "name" => "Content Writer",
            ],
            [
                "name" => "Desain Grafis",
            ],
            [
                "name" => "Digital Market",
            ],
            [
                "name" => "Frontend Programmer",
            ],
            [
                "name" => "Host/Presenter",
            ],
            [
                "name" => "Human Resource",
            ],
            [
                "name" => "Las",
            ],
            [
                "name" => "Marketing & Sales",
            ],
            [
                "name" => "Photographer",
            ],
            [
                "name" => "Project Manager",
            ],
            [
                "name" => "Public Relation",
            ],
            [
                "name" => "Social Media Specialist",
            ],
            [
                "name" => "Tiktok Creator",
            ],
            [
                "name" => "Ui/Ux Designer",
            ],
            [
                "name" => "Videographer",
            ],
            [
                "name" => "Voice Over Talent",
            ],
        ];

        SkillList::insert($data);
    }
}
