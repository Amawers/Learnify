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
        Schema::create('learning_materials', function (Blueprint $table) {
            $table->id('learning_materials_id');
            $table->string('image_path');
            $table->string('lesson_name');
            $table->foreignId('course_id')
                    ->constrained(table: 'courses', column: 'id')
                    ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_material');
    }
};
