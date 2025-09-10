<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            [
                'number' => 1,
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1
            ],
            [
                'number' => 2,
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1
            ],
            [
                'number' => 3,
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1
            ],
            [
                'number' => 4,
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1
            ],
            [
                'number' => 1,
                'university_id' => 1,
                'section_id' => 2,
                'level_id' => 2
            ],
            [
                'number' => 1,
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 3
            ],
            [
                'number' => 2,
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 3
            ]
        ];

        foreach ($groups as $group):
            Group::create($group);
        endforeach;
    }
}
