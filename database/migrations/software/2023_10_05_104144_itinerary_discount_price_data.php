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
        Schema::create('itinerary_discount_price_data', function (Blueprint $table) {
            $table->id();
            $table->integer('iti_id');
            $table->integer('price_status')->default(0)->comment('0=approved,1=pending by supermanager');
            $table->string('standard_rates', 100)->nullable();
            $table->string('deluxe_rates', 100)->nullable();
            $table->string('super_deluxe_rates', 100)->nullable();
            $table->string('luxury_rates', 100)->nullable();
            $table->text('per_person_ratemeta')->nullable()->comment('rates per person meta with inc/exc gst');
            $table->integer('agent_id')->comment('agent_id: Who Update Price');
            $table->integer('sent_status')->default(0)->comment('price sent to client 1=true');
            $table->integer('agent_price')->default(0)->comment('price increased by agent in %');
            $table->timestamps(0); // Use timestamps(0) to prevent updated_at and created_at from being updated on insert
            $table->integer('train_flight_cab_price_dis')->nullable();
            $table->longText('per_hotel_ratemeta')->nullable();
            $table->string('cab_rate_per', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerary_discount_price_data');
    }
};
