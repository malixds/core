<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjectsArr = [
            'Математический анализ',
            'Линейная алгебра',
            'Физика',
            'Системное программное обеспечение',
            'История',
            'Английский язык',
            'Технологияя хранения данных',
            'ОБЖ',
            'Технологии беспроводных сетей',
        ];
        foreach ($subjectsArr as $value) {
            Subject::create([
                'name' => $value
            ]);
        }
    }
}
