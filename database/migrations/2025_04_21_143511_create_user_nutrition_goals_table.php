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
        Schema::create('user_nutrition_goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('target_calories');
            $table->integer('target_protein_grams');
            $table->integer('target_carb_grams');
            $table->integer('target_fat_grams');
            $table->timestamp('last_updated');
            $table->timestamps();
            
            // A user should have only one set of nutrition goals at any time
            $table->unique('user_id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_nutrition_goals');
    }
};
