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
        Schema::create('course_topics', function (Blueprint $table) {
            $table->id('course_topics_id');
            $table->string('topic');
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
        Schema::dropIfExists('course_topic');
    }
};
