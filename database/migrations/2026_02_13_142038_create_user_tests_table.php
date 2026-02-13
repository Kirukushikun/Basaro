<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['pretest', 'posttest']);
            $table->json('answers');          // ['1' => 'A', '2' => 'C', ...]
            $table->integer('score');         // number of correct answers
            $table->integer('attempt');       // 1 = first attempt, 2, 3, ...
            $table->boolean('is_first')->default(false); // quick flag for first attempt
            $table->timestamps();

            $table->index(['user_id', 'type', 'attempt']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_tests');
    }
};