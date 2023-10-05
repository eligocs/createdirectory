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
        Schema::create('hotel_booking', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id', 20);
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('state_id');
            $table->string('city_id', 100);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('iti_id');
            $table->string('total_travellers', 100);
            $table->integer('total_rooms');
            $table->string('room_cost', 100);
            $table->string('extra_bed')->nullable();
            $table->string('extra_bed_cost', 100);
            $table->string('without_extra_bed')->nullable();
            $table->string('without_extra_bed_cost', 10);
            $table->string('inclusion_cost', 100);
            $table->string('check_in', 100);
            $table->string('check_out', 200);
            $table->string('meal_plan', 200);
            $table->string('inclusion', 200);
            $table->unsignedBigInteger('room_type');
            $table->string('hotel_tax', 10);
            $table->string('total_cost', 200);
            $table->unsignedBigInteger('agent_id');
            $table->integer('email_count')->default(0);
            $table->integer('del_status')->default(0);
            $table->integer('booking_status')->default(0);
            $table->text('booking_note')->nullable();
            $table->string('booking_cancel_note', 200)->nullable();
            $table->string('hotel_cancel_booking_note', 255)->nullable();
            $table->float('room_cost_old_by_agent', 20, 2)->nullable();
            $table->tinyInteger('is_approved_by_gm')->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('countryids')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_booking');   
    }
};
