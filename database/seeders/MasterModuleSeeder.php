<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            // JK 8-12 (category_id: 3)
            [
                'm_category_id' => 3,
                'code' => 'JK812-001',
                'name' => '2D Games with Roblox',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 3,
                'code' => 'JK812-002',
                'name' => 'Mobile Apps Development',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 3,
                'code' => 'JK812-003',
                'name' => 'Roblox I',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 3,
                'code' => 'JK812-004',
                'name' => 'Roblox II',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 3,
                'code' => 'JK812-005',
                'name' => 'NFT ART',
                'is_active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 3,
                'code' => 'JK812-006',
                'name' => 'Website Development',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // JK 12-16 (category_id: 4)
            [
                'm_category_id' => 4,
                'code' => 'JK1216-001',
                'name' => 'Python First Programmes',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 4,
                'code' => 'JK1216-002',
                'name' => 'Python Arcade Games',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 4,
                'code' => 'JK1216-003',
                'name' => 'Website Development',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 4,
                'code' => 'JK1216-004',
                'name' => 'Javascript',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 4,
                'code' => 'JK1216-005',
                'name' => 'IoT',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 4,
                'code' => 'JK1216-006',
                'name' => '2D&3D Design',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 4,
                'code' => 'JK1216-007',
                'name' => 'Junior CEO',
                'is_active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // LK 4-6 (category_id: 1) - Robo Explorers
            [
                'm_category_id' => 1,
                'code' => 'LK46-001',
                'name' => 'Robo Explorers',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 1,
                'code' => 'LK46-002', 
                'name' => 'My First Smart Robot',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // LK 6-8 (category_id: 2) - Smart Moves with AI Bot, Code Your Robo-Car
            [
                'm_category_id' => 2,
                'code' => 'LK68-001',
                'name' => 'Smart Moves with AI Bot',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 2,
                'code' => 'LK68-002',
                'name' => 'Code Your Robo-Car',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // JK 12-16 (category_id: 4) - Additional modules
            [
                'm_category_id' => 4,
                'code' => 'JK1216-008',
                'name' => 'Drone Coding & Autonomous Flight',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 4,
                'code' => 'JK1216-009',
                'name' => 'Arduino Smart Car',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'm_category_id' => 4,
                'code' => 'JK1216-010',
                'name' => 'Connected World - Smart IoT Solutions',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert modules
        DB::table('master_modules')->insert($modules);

        $this->command->info('Master modules seeded successfully!');
        $this->command->info('Total modules: ' . count($modules));
        
        // Show summary by category
        $summary = DB::table('master_modules')
            ->join('master_categories', 'master_modules.m_category_id', '=', 'master_categories.id')
            ->select('master_categories.name as category_name', DB::raw('COUNT(*) as module_count'))
            ->groupBy('master_categories.name')
            ->get();

        $this->command->info('Module distribution by category:');
        foreach ($summary as $item) {
            $this->command->info("  - {$item->category_name}: {$item->module_count} modules");
        }
    }
}