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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->enum('sex', ['Male', 'Female', 'Other', 'PreferNotToSay']);
            $table->integer('height_cm');
            $table->decimal('current_weight_kg', 5, 2);
            $table->foreignId('activity_level_id')->constrained();
            $table->foreignId('fitness_goal_id')->constrained();
            $table->foreignId('experience_level_id')->constrained();
            $table->foreignId('workout_type_id')->constrained();
            $table->timestamp('last_profile_update')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
