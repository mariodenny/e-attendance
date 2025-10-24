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
                'role' => 'TEACHER',
                'email' => 'susan@kodingnext.com',
                'email_verified_at' => $now,
                'password' => Hash::make('12345678'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'Rafiqoh',
                'role' => 'TEACHER',
                'email' => 'rafiqoh@kodingnext.com',
                'email_verified_at' => $now,
                'password' => Hash::make('12345678'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'Anggia',
                'role' => 'TEACHER',
                'email' => 'anggia@kodingnext.com',
                'email_verified_at' => $now,
                'password' => Hash::make('12345678'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'Cindy Sinaga',
                'role' => 'TEACHER',
                'email' => 'cindy.sinaga@kodingnext.com',
                'email_verified_at' => $now,
                'password' => Hash::make('12345678'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'Dara Novita Sari',
                'role' => 'TEACHER',
                'email' => 'dara@kodingnext.com',
                'email_verified_at' => $now,
                'password' => Hash::make('12345678'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'admin cemara',
                'role' => 'ADMIN',
                'email' => 'admin.cemara@kodingnext.com',
                'email_verified_at' => $now,
                'password' => Hash::make('12345678'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'Manager cemara',
                'role' => 'MANAGER',
                'email' => 'mgr.cemara@kodingnext.com',
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
