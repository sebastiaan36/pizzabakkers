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
        Schema::create('ingredients_pizza', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('pizza_id')->constrained();
            $table->foreignId('ingredients_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients_pizza');
    }
};
