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
        Schema::create('cab_booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iti_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('cab_id');
            $table->unsignedBigInteger('transporter_id');
            $table->string('picking_date', 100)->nullable();
            $table->string('droping_date', 100)->nullable();
            $table->string('reporting_time', 100)->nullable();
            $table->string('departure_time', 100)->nullable();
            $table->string('booking_duration', 100)->nullable();
            $table->string('pic_location', 200)->nullable();
            $table->string('drop_location', 200)->nullable();
            $table->string('total_travellers', 100);
            $table->string('cab_rate', 100)->nullable();
            $table->unsignedInteger('total_cabs')->nullable();
            $table->longText('cab_meta')->nullable();
            $table->string('extra_charges', 15)->nullable();
            $table->string('total_cost', 100)->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->unsignedInteger('email_count')->default(0);
            $table->unsignedInteger('booking_status')->nullable();
            $table->longText('booking_note')->nullable();
            $table->float('cab_rate_old_by_agent', 20, 2)->nullable();
            $table->tinyInteger('is_approved_by_gm')->default(0)->comment('2 = approved, 1 = pending');
            $table->tinyInteger('del_status')->default(0);
            $table->timestamps(6);
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();

            //$table->foreign('iti_id')->references('id')->on('itineraries');
            //$table->foreign('customer_id')->references('id')->on('customers');
            //$table->foreign('cab_id')->references('id')->on('cabs');
            //$table->foreign('transporter_id')->references('id')->on('transporters');
            //$table->foreign('agent_id')->references('id')->on('agents');
            //$table->foreign('country_id')->references('id')->on('countries');
            //$table->foreign('state_id')->references('id')->on('states');
            //$table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cab_booking');
    }
};
