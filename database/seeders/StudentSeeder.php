<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            [
                'name' => 'ابتسام عبدالله صالح صالح الدع',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'ابرار علي عبدالله الدحان',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'ابرار رشيد علي عبدالله',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 4
            ],
            [
                'name' => 'احمد فؤاد احمد مرشد حزام الراعي',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'اسامه محمد ناجي محمد شريان',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'اسامه محمد هزاع عبدالغني',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'اسامه نبيل محمد عبدالله نعمان',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 2
            ],
            [
                'name' => 'اسامه نعمان عبدالله احمد',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'اسماء حمزه عبدالرحمن العديني',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'افنان عبدالسلام قاسم احمد العبسي',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 4
            ],
            [
                'name' => 'اميره نبيل عبدالحميد الشرماني',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'انس خليل علي محمد يحي',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'انس محمد علي قايد الخولاني',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'ايوب فهد عبده قاسم الدعاس',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'جلال احمد محمد احمد ثابت الراشدي',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'حامد سمير محمد عبدالحافظ',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'حببيب احمد محمد قاسم',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'حسام عبدالسلام احمد المجاهد',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'حسان محمد حسن ملهي الحجري',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'حمزه عبدالله محمد علي شعبان',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'رغد بشير محمد مؤنس',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'رنا رياض عبدالودود الخطيب',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'مروى عادل حسين حسن العواضي',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ],
            [
                'name' => 'محمد احمد علي ملهي محمد',
                'university_id' => 1,
                'section_id' => 1,
                'level_id' => 1,
                'group_id' => 1
            ]
        ];

        foreach ($students as $student):
            Student::create($student);
        endforeach;
    }
}
