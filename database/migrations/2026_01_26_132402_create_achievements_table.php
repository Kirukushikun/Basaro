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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->unsignedTinyInteger('lesson'); // 1–20
            $table->enum('medal', ['gold', 'silver', 'bronze']);
            $table->enum('type', ['pagsasanay', 'pagtataya']);

            $table->unsignedInteger('count')->default(1);

            $table->timestamps();

            $table->unique(['user_id', 'lesson', 'type', 'medal']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
