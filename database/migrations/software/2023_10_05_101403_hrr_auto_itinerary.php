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
        Schema::create('hrr_auto_itinerary', function (Blueprint $table) {
            $table->id();
            $table->timestamp('check_in_date')->default('0000-00-00 00:00:00');
            $table->timestamp('check_out_date')->default('0000-00-00 00:00:00');
            $table->integer('city_id');
            $table->integer('mealsPlan');
            $table->integer('no_of_room');
            $table->longText('booking_details');
            $table->integer('iti_id');
            $table->string('unique_id')->nullable();
            $table->integer('total_nights')->nullable();
            $table->string('final_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrr_auto_itinerary');
    }
};
