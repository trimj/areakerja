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
                "slug" => "administrasi",
            ],
            [
                "name" => "Animasi",
                "slug" => "animasi",
            ],
            [
                "name" => "Backend Programmer",
                "slug" => "backend-programmer",
            ],
            [
                "name" => "Content Planner",
                "slug" => "content-planner",
            ],
            [
                "name" => "Content Writer",
                "slug" => "content-writer",
            ],
            [
                "name" => "Desain Grafis",
                "slug" => "desain-grafis",
            ],
            [
                "name" => "Digital Market",
                "slug" => "digital-market",
            ],
            [
                "name" => "Frontend Programmer",
                "slug" => "frontend-programmer",
            ],
            [
                "name" => "Host/Presenter",
                "slug" => "host-presenter",
            ],
            [
                "name" => "Human Resource",
                "slug" => "human-resource",
            ],
            [
                "name" => "Las",
                "slug" => "las",
            ],
            [
                "name" => "Marketing & Sales",
                "slug" => "marketing-sales",
            ],
            [
                "name" => "Photographer",
                "slug" => "photographer",
            ],
            [
                "name" => "Project Manager",
                "slug" => "project-manager",
            ],
            [
                "name" => "Public Relation",
                "slug" => "public-relation",
            ],
            [
                "name" => "Social Media Specialist",
                "slug" => "social-media-specialist",
            ],
            [
                "name" => "Tiktok Creator",
                "slug" => "tiktok-creator",
            ],
            [
                "name" => "Ui/Ux Designer",
                "slug" => "ui-ux-designer",
            ],
            [
                "name" => "Videographer",
                "slug" => "videographer",
            ],
            [
                "name" => "Voice Over Talent",
                "slug" => "voice-over-talent",
            ],
        ];

        SkillList::insert($data);
    }
}
