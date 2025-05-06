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
        Schema::create('template_food_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->constrained('food_suggestion_templates')->onDelete('cascade');
            $table->foreignId('food_id')->constrained('food_items')->onDelete('cascade');
            $table->decimal('suggested_quantity', 6, 2); // servings
            $table->boolean('is_required')->default(true);
            $table->unsignedBigInteger('alternatives_group_id')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('template_food_items');
    }
};
