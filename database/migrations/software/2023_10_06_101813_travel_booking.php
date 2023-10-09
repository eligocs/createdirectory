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
        Schema::create('travel_booking', function (Blueprint $table) {
            $table->id();
            $table->integer('iti_id');
            $table->integer('customer_id');
            $table->string('booking_type', 200)->comment('bus,train,flight');
            $table->string('total_travellers', 255);
            $table->string('t_name', 200);
            $table->string('t_number', 100);
            $table->string('class_type', 100);
            $table->string('dep_date', 100);
            $table->string('arr_date', 200);
            $table->string('dep_time', 200);
            $table->string('arr_time', 200);
            $table->string('dep_loc', 200);
            $table->string('arr_loc', 200);
            $table->integer('total_seats');
            $table->string('seat_numbers', 200);
            $table->string('ticket_numbers', 200);
            $table->string('other_info', 300);
            $table->string('return_t_name', 100);
            $table->string('return_t_number', 100);
            $table->string('return_class_type', 100);
            $table->string('return_dep_date', 100);
            $table->string('return_dep_time', 100);
            $table->string('return_dep_loc', 100);
            $table->integer('return_total_seats');
            $table->string('return_ticket_numbers', 100);
            $table->string('return_seat_numbers', 200);
            $table->integer('booking_status')->default(0)->comment('9=approved, 8=cancel booking');
            $table->integer('agent_id');
            $table->integer('del_status')->default(0);
            $table->tinyInteger('is_approved_by_gm')->default(0)->comment('1=pending, 2=approved');
            $table->float('cost_per_seat', 20, 2)->nullable();
            $table->float('old_cost_per_seat', 20, 2);
            $table->float('cost_per_seat_return_trip', 20, 2);
            $table->float('old_cost_per_seat_return_trip', 20, 2);
            $table->timestamp('created');
            $table->integer('adults')->nullable();
            $table->integer('child')->nullable();
            $table->integer('Infant')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->longText('multicityData')->nullable();
            $table->string('price', 200)->nullable();
            $table->longText('layovers')->nullable();
            $table->longText('round')->nullable();

            
        // Set the auto-increment starting value to 1000
    }); 
    DB::statement('ALTER TABLE travel_booking AUTO_INCREMENT = 1000;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_booking');
    }
};
