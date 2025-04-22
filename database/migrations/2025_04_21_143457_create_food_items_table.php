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
        Schema::create('food_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('serving_size_description');
            $table->decimal('serving_size_grams', 8, 2)->nullable();
            $table->decimal('calories_per_serving', 8, 2);
            $table->decimal('protein_grams_per_serving', 8, 2);
            $table->decimal('carb_grams_per_serving', 8, 2);
            $table->decimal('fat_grams_per_serving', 8, 2);
            $table->text('allergy_info')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_items');
    }
};
