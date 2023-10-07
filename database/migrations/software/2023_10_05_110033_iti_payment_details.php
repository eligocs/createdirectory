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
        Schema::create('iti_payment_details', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->nullable();
            $table->unsignedBigInteger('iti_id');
            $table->enum('iti_type', ['1', '2'])->default('1')->comment('1=itinerary,2=accommodation');
            $table->string('iti_package_type')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->string('customer_name', 200);
            $table->string('customer_contact', 200);
            $table->string('customer_email', 200);
            $table->string('total_package_cost', 200);
            $table->integer('package_actual_cost');
            $table->integer('agent_margin')->default(0)->comment('agent margin in %');
            $table->integer('is_below_base_price')->default(0)->comment('1=package cost is below base price');
            $table->integer('is_gst')->default(0)->comment('0= gst extra, 1 = gst included');
            $table->string('total_balance_amount', 200);
            $table->integer('total_discount')->default(0);
            $table->string('advance_recieved', 200);
            $table->string('advance_trans_date', 200);
            $table->string('bank_name', 200);
            $table->string('booking_date', 200)->comment('booking date when itinerary booked');
            $table->string('next_payment', 200);
            $table->string('next_payment_due_date', 200);
            $table->string('second_payment_bal', 30);
            $table->string('second_payment_date', 30)->nullable();
            $table->string('second_pay_status', 10)->default('unpaid')->comment('paid/unpaid');
            $table->string('third_payment_bal', 30)->nullable();
            $table->string('third_payment_date', 30)->nullable();
            $table->string('third_pay_status', 10)->default('unpaid')->comment('paid/unpaid');
            $table->string('final_payment_bal', 30)->nullable();
            $table->string('final_payment_date', 30)->nullable();
            $table->string('final_pay_status', 10)->default('unpaid')->comment('paid/unpaid');
            $table->string('refund_amount', 10)->default('0');
            $table->string('refund_due_date', 50)->nullable();
            $table->string('refund_status', 10)->nullable()->comment('paid/unpaid');
            $table->text('approved_note')->nullable();
            $table->string('travel_date', 50)->nullable();
            $table->text('amendment_note')->nullable();
            $table->unsignedBigInteger('agent_id');
            $table->integer('iti_booking_status')->default(0)->comment('0=approved,1=onhold,2=rejected by payment, 3 = reject due to itinerary mistake');
            $table->string('client_aadhar_card', 255)->nullable();
            $table->string('payment_screenshot', 255)->nullable();
            $table->integer('iti_close_status')->default(0)->comment('1=closed');
            $table->tinyInteger('approved_by_account_team')->default(0)->comment('1 = approved by accounts team and proceed to hotel booking');
            $table->integer('payment_confirmed_status')->default(0)->comment('1=confirmed');
            $table->text('last_payment_received_date')->default('0000-00-00 00:00:00')->comment('last payment received date');
            $table->timestamps(0); // Disable Laravel's default created_at and updated_at columns
            $table->integer('is_invoice_created')->default(0);
            $table->integer('tsxTotal')->nullable();
            $table->string('is_travel_date', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iti_payment_details');
    }
};
