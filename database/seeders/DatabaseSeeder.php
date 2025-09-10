<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            UniversitySeeder::class,
            SectionSeeder::class,
            LevelSeeder::class,
            GroupSeeder::class,
            StudentSeeder::class,
        ]);
    }
}
