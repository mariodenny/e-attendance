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
        Schema::create('trials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('m_module_id')->references('id')->on('master_modules');
            $table->foreignId('teacher_id')->references('id')->on('teachers');
            $table->string('name');
            $table->string('contact_person');
            $table->string('phone_no');
            $table->datetime('date')->nullable();
            $table->enum('status', ['PENDING', 'JOIN', 'CANCEL', 'ENROLL']);
            $table->string('feedbacks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trials');
    }
};
