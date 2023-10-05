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
        Schema::create('hrr_extra_bed_cost', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id');
            $table->integer('room_cat_id');
            $table->integer('season_id');
            $table->decimal('without_extra_bed', 15, 2)->nullable();
            $table->decimal('with_extra_bed', 15, 2)->nullable();
            $table->integer('updatedBy');
            $table->timestamps();
            $table->string('type', 225);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrr_extra_bed_cost');
    }
};
