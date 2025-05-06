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
        Schema::create('food_suggestion_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('food_suggestion_categories')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('target_meal_type', ['Breakfast', 'Lunch', 'Dinner', 'Snack', 'Any']);
            $table->foreignId('min_experience_level_id')->nullable()->constrained('experience_levels')->onDelete('set null');
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_suggestion_templates');
    }
};
