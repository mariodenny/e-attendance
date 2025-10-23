<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'user_id' => 1,
                'name'=> 'Denny Mario',
                'nik' => 'NIK-0419',
                'level' => 'Junior Koders',
                'gender' => 'Men',
                'created_at' => now('Asia/Jakarta'),
                'updated_at' => now('Asia/Jakarta'),
            ]
        ];

        Teacher::insert($datas);
    }
}
