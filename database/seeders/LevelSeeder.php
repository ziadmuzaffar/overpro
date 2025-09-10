<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            [
                'name' => 'الثالث',
                'university_id' => 1,
                'section_id' => 1
            ],
            [
                'name' => 'الثالث',
                'university_id' => 1,
                'section_id' => 2
            ],
            [
                'name' => 'الرابع',
                'university_id' => 1,
                'section_id' => 1
            ]
        ];

        foreach ($levels as $level):
            Level::create($level);
        endforeach;
    }
}
