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
        Schema::create('enrolled_subjects', function (Blueprint $table) {
            $table->id('enrolled_subjects_id');
            $table->foreignId('user_id')
                    ->constrained(table: 'users', column: 'id')
                    ->cascadeOnDelete();
            $table->foreignId('course_id')
                    ->constrained(table: 'courses', column: 'course_id')
                    ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolled_students');
    }
};
