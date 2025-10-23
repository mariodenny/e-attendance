<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                "m_module_id" => 2,
                "name" => "Alden Elan Zhou",
                "date_of_birth" => "2016-09-09",
                "address" => "JL. Indonesia Street 123",
                "email" => "rolianilo@gmail.com",
                "school" => "Chandra Kumala School",
                "contact_person" => "Mommy",
                "phone_no" => "08123456789",
                "created_at" => now('Asia/Jakarta'),
                "updated_at" => now('Asia/Jakarta')
            ]
        ];

        Student::insert($datas);
    }
}
