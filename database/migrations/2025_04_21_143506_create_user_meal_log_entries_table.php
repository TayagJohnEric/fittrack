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
        Schema::create('user_meal_log_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_log_id')->constrained('user_meal_logs')->onDelete('cascade');
            $table->foreignId('food_id')->nullable()->constrained('food_items')->nullOnDelete();
            $table->decimal('quantity_consumed', 8, 2);
            $table->string('custom_food_name')->nullable();
            $table->decimal('custom_calories', 8, 2)->nullable();
            $table->decimal('custom_protein', 8, 2)->nullable();
            $table->decimal('custom_carbs', 8, 2)->nullable();
            $table->decimal('custom_fat', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_meal_log_entries');
    }
};
