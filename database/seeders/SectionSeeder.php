<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'name' => 'تقنية المعلومات',
                'university_id' => 1
            ],
            [
                'name' => 'الامن السيبراني',
                'university_id' => 1
            ]
        ];

        foreach ($sections as $section):
            Section::create($section);
        endforeach;
    }
}
