<?php

namespace Database\Seeders;

use App\Models\Clasroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'teacher_id' => 1,
                'student_id' => 1,
                'm_module_id' => 2,
                'terms' => "C",
                'year' => "2025",
                "created_at" => now('Asia/Jakarta'),
                "updated_at" => now('Asia/Jakarta')
            ]
        ];
        Clasroom::insert($datas);
    }
}
