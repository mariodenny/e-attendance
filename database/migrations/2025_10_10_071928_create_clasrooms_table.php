<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clasrooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->references('id')->on('teachers');
            $table->foreignId('student_id')->references('id')->on('students');
            $table->foreignId('m_module_id')->references('id')->on('master_modules');
            $table->enum('terms', ["A", "A+", "B", "B+", "C", "C+", "D", "D+"]);
            $table->string("year");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clasrooms');
    }
};
