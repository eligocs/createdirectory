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
        Schema::create('customers_inquery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('temp_key', 50)->nullable();
            $table->tinyInteger('customer_type')->default(0)->comment('0=Direct Customer OR 1=Travel Partner,2=Reference');
            $table->string('reference_name', 50)->nullable()->comment('if customer_type = 2');
            $table->string('reference_contact_number', 25)->nullable()->comment('if customer_type = 2');
            $table->string('customer_name', 200);
            $table->string('customer_email', 200);
            $table->string('customer_contact', 50);
            $table->string('whatsapp_number', 50)->nullable();
            $table->string('customer_address', 500)->nullable();
            $table->string('quotation_type', 20)->default('holidays')->comment('Holidays/Accommodation/Cab');
            $table->string('package_type', 200)->nullable();
            $table->string('package_type_other', 200)->nullable();
            $table->string('adults', 20)->nullable();
            $table->string('child', 20)->nullable();
            $table->string('dob', 20)->nullable();
            $table->string('child_age', 100)->nullable();
            $table->string('travel_date', 200)->nullable();
            $table->string('total_rooms', 100)->nullable();
            $table->string('destination', 200)->nullable();
            $table->string('pickup_point', 100)->nullable();
            $table->string('droping_point', 100)->nullable();
            $table->string('package_car_type', 100)->nullable();
            $table->string('package_car_type_other', 200)->nullable();
            $table->string('meal_plan', 100)->nullable();
            $table->string('honeymoon_kit', 100)->nullable();
            $table->string('car_type_sightseen', 100)->nullable();
            $table->string('hotel_category', 100)->nullable();
            $table->string('budget', 100)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('assign_by')->nullable();
            $table->unsignedBigInteger('agent_id');
            $table->tinyInteger('is_subscriber')->default(0)->comment('0 = Subscriber, 1 = Unsubscribe');
            $table->string('decline_reason', 200)->nullable()->comment('if cus_status == 8 ( decline reason goes here )');
            $table->string('decline_comment', 500)->nullable();
            $table->integer('cus_status')->default(0)->comment('0=pending, 9=booked, 8=decline');
            $table->string('cus_last_followup_status', 200)->default('0');
            $table->tinyInteger('del_status')->default(0);
            $table->string('lead_last_followup_date', 200)->nullable();
            $table->integer('reopen_status')->default(0)->comment('9=approved, 8=declined, 7=working, 0=noaction');
            $table->unsignedBigInteger('reopen_by')->nullable()->comment('agent_id who reopened the lead');
            $table->unsignedBigInteger('parent_customer_id')->nullable();
            $table->integer('lead_close_status')->default(0)->comment('1=closed');
            $table->integer('review_request_status')->default(0)->comment('1=review request sent to customer');
            $table->timestamps();
            $table->string('meal_plan_type', 50)->nullable();
            $table->text('requirements_meta')->nullable();
            $table->timestamp('assigned_date')->default(now());
            $table->string('infant', 255)->nullable();
            $table->unsignedBigInteger('destinationState')->nullable();
            $table->integer('total_night')->nullable();
            $table->longText('destination_meta')->nullable();
            $table->integer('day')->nullable();
            $table->comment('auto increment starting from 1000');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers_inquery');
    }
};
