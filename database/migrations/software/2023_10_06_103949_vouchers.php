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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id('voucher_id');
            $table->string('temp_key', 100);
            $table->integer('iti_id');
            $table->integer('customer_id');
            $table->string('customer_name', 200);
            $table->string('customer_contact', 200);
            $table->string('customer_email', 200);
            $table->string('customer_address', 500);
            $table->string('adults', 20);
            $table->string('children', 200);
            $table->string('package_name', 100);
            $table->string('travel_date', 100);
            $table->string('travel_end_date', 100);
            $table->string('hotel_ids', 100);
            $table->string('total_rooms', 100);
            $table->string('vehicle_type', 100);
            $table->longText('daywiseplan');
            $table->longText('hotel_notes_meta');
            $table->longText('vc_inc');
            $table->longText('vc_exc');
            $table->string('package_cost', 100);
            $table->integer('tax');
            $table->string('grand_total', 200);
            $table->string('advance_payment', 200);
            $table->string('balance_payment', 100);
            $table->string('last_installment', 100);
            $table->integer('email_count')->default(0)->comment('How many times voucher sent to customer');
            $table->integer('agent_id');
            $table->integer('del_status')->default(0);
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
