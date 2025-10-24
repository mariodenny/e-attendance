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
                'name' => 'Denny Mario',
                'nik' => 'NIK-0419',
                'level' => 'Junior Koders',
                'gender' => 'Men',
                'created_at' => now('Asia/Jakarta'),
                'updated_at' => now('Asia/Jakarta'),
            ],
            [
                'user_id' => 2,
                'name' => 'Susan',
                'nik' => 'NIK-0420',
                'level' => 'Junior Koders',
                'gender' => 'Women',
                'created_at' => now('Asia/Jakarta'),
                'updated_at' => now('Asia/Jakarta'),
            ],
            [
                'user_id' => 3,
                'name' => 'Rafiqoh',
                'nik' => 'NIK-0421',
                'level' => 'Junior Koders',
                'gender' => 'Women',
                'created_at' => now('Asia/Jakarta'),
                'updated_at' => now('Asia/Jakarta'),
            ],
            [
                'user_id' => 4,
                'name' => 'Anggia',
                'nik' => 'NIK-0422',
                'level' => 'Junior Koders',
                'gender' => 'Women',
                'created_at' => now('Asia/Jakarta'),
                'updated_at' => now('Asia/Jakarta'),
            ],
            [
                'user_id' => 5,
                'name' => 'Cindy Sinaga',
                'nik' => 'NIK-0423',
                'level' => 'Little Koders',
                'gender' => 'Women',
                'created_at' => now('Asia/Jakarta'),
                'updated_at' => now('Asia/Jakarta'),
            ],
            [
                'user_id' => 6,
                'name' => 'Dara',
                'nik' => 'NIK-0424',
                'level' => 'Little Koders',
                'gender' => 'Women',
                'created_at' => now('Asia/Jakarta'),
                'updated_at' => now('Asia/Jakarta'),
            ]
        ];

        Teacher::insert($datas);
    }
}
