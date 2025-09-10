<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        $universities = [
            ['name' => 'الوطنية']
        ];

        foreach ($universities as $university):
            University::create($university);
        endforeach;
    }
}
