<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Karim Benali',
                'position' => 'General Manager & Founder',
                'initials' => 'KB',
                'linkedin' => 'https://linkedin.com',
                'translations' => [
                    'en' => ['name' => 'Karim Benali', 'position' => 'General Manager & Founder'],
                    'ar' => ['name' => 'كريم بن علي', 'position' => 'المدير العام والمؤسس'],
                    'fr' => ['name' => 'Karim Benali', 'position' => 'Directeur Général & Fondateur'],
                ],
            ],
            [
                'name' => 'Yassine Mansouri',
                'position' => 'Chief Commercial Officer',
                'initials' => 'YM',
                'linkedin' => 'https://linkedin.com',
                'translations' => [
                    'en' => ['name' => 'Yassine Mansouri', 'position' => 'Chief Commercial Officer'],
                    'ar' => ['name' => 'ياسين منصوري', 'position' => 'المدير التجاري الرئيسي'],
                    'fr' => ['name' => 'Yassine Mansouri', 'position' => 'Directeur Commercial'],
                ],
            ],
            [
                'name' => 'Amel Bouzid',
                'position' => 'Director of Retail Partnerships',
                'initials' => 'AB',
                'linkedin' => '',
                'translations' => [
                    'en' => ['name' => 'Amel Bouzid', 'position' => 'Director of Retail Partnerships'],
                    'ar' => ['name' => 'أمل بوزيد', 'position' => 'مديرة شراكات التجزئة'],
                    'fr' => ['name' => 'Amel Bouzid', 'position' => 'Directrice des Partenariats'],
                ],
            ],
            [
                'name' => 'Sofiane Hadj',
                'position' => 'Head of Logistics & Supply',
                'initials' => 'SH',
                'linkedin' => '',
                'translations' => [
                    'en' => ['name' => 'Sofiane Hadj', 'position' => 'Head of Logistics & Supply'],
                    'ar' => ['name' => 'سفيان حاج', 'position' => 'رئيس اللوجستيات والتزويد'],
                    'fr' => ['name' => 'Sofiane Hadj', 'position' => 'Chef Logistique & Approvisionnement'],
                ],
            ],
        ];

        foreach ($members as $m) {
            TeamMember::firstOrCreate(
                ['name' => $m['name']],
                $m
            );
        }
    }
}
