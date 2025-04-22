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
        Schema::create('user_workout_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('template_id')->constrained('workout_templates')->onDelete('cascade');
            $table->date('assigned_date');
            $table->enum('status', ['Pending', 'Completed', 'Skipped', 'Not Completed'])->default('Pending');
            $table->timestamp('completion_date')->nullable();
            $table->text('user_notes')->nullable();
            $table->timestamps();
            
            // Ensure a user has only one workout scheduled per day
            $table->unique(['user_id', 'assigned_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_workout_schedules');
    }
};
