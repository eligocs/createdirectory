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
        Schema::create('iti_vouchers_status', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_id', 50)->nullable();
            $table->unsignedBigInteger('iti_id')->nullable();
            $table->integer('hotel_booking_status')->default(0)->comment('1=all booking complete');
            $table->integer('vtf_booking_status')->default(0)->comment('1=all booking complete');
            $table->integer('cab_booking_status')->default(0)->comment('1=all booking complete');
            $table->integer('confirm_voucher')->default(0);
            $table->string('agent_comment', 200)->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->integer('sent_count')->default(0)->comment('sent to client');
            $table->timestamps(0); // Use 0 for Laravel 7 and later
            $table->integer('vtf_Train_booking_status')->default(0);
            $table->integer('vtf_Volvo_booking_status')->default(0);
            $table->integer('all_booking_done')->default(0);

            //$table->foreign('iti_id')->references('iti_id')->on('itinerary'); // Assuming 'itinerary' is the related table
            //$table->foreign('agent_id')->references('id')->on('agents'); // Assuming 'agents' is the related table for agents
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iti_vouchers_status');
    }
};
