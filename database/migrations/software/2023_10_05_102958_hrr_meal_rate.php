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
        Schema::create('hrr_meal_rate', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id');
            $table->integer('season_id');
            $table->integer('meal_id');
            $table->decimal('prices', 15, 2);
            $table->integer('updatedBy');
            $table->timestamp('created_date')->default(now());
            $table->timestamp('updated_date')->default(now());
            $table->string('type', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrr_meal_rate');
    }
};
