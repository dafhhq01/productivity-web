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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->enum('category', ['gaji', 'makan', 'transport', 'belanja', 'tagihan', 'hiburan', 'pendidikan', 'lainnya']);
            $table->decimal('amount', 15, 2);
            $table->smallInteger('year');
            $table->unsignedTinyInteger('month');
            $table->timestamps();
            
            $table->unique(['user_id', 'category', 'year', 'month']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
