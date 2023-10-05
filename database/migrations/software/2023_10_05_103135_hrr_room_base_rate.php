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
        Schema::create('hrr_room_base_rate', function (Blueprint $table) {
            $table->id();
            $table->integer('season_id')->nullable();
            $table->integer('room_cat_id')->nullable();
            $table->integer('hotel_id')->nullable();
            $table->decimal('prices', 15, 2)->nullable();
            $table->integer('updatedBy')->nullable();
            $table->timestamp('created_date', 6)->default(now());
            $table->timestamp('updated_date', 6)->default(now());
            $table->string('type', 60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrr_room_base_rate');
    }
};
