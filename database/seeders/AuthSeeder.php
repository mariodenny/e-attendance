<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now('Asia/Jakarta');
        $users = [
            [
                'username' => 'Denny',
                'role' => 'TEACHER',
                'email' => 'denny@kodingnext.com',
                'email_verified_at' => $now,
                'password' => Hash::make('12345678'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'Susan',
                'role' => 'ADMIN',
                'email' => 'susan@kodingnext.com',
                'email_verified_at' => $now,
                'password' => Hash::make('12345678'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'Rafiqoh',
                'role' => 'MANAGER',
                'email' => 'rafiqoh@kodingnext.com',
                'email_verified_at' => $now,
                'password' => Hash::make('12345678'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'SA - Cemara',
                'role' => 'SA',
                'email' => 'sa.cemara@kodingnext.com',
                'email_verified_at' => $now,
                'password' => Hash::make('12345678'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        User::insert($users);
    }
}
