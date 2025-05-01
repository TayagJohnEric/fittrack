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
        Schema::table('workout_templates', function (Blueprint $table) {
            $table->boolean('is_generic')->default(false)->after('workout_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workout_templates', function (Blueprint $table) {
            $table->dropColumn('is_generic');
        });
    }
};