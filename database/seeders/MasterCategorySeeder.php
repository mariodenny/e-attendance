<?php

namespace Database\Seeders;

use App\Models\Master\MasterCategory;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now('Asia/Jakarta');

        $datas = [
            [
                "name" => "LK 4-6",
                "description" => "Little Koders 4 to 6 years old",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "LK 6-8",
                "description" => "Little Koders 6 to 8 years old",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "JK 8-12",
                "description" => "Junior Koders 8 to 12 years old",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "JK 12-16",
                "description" => "Junior Koders 12 to 16 years old",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ];

        MasterCategory::insert($datas);
    }
}
