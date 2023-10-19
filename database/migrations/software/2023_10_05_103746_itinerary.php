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
        Schema::create('itinerary', function (Blueprint $table) {
            $table->increments('iti_id');
            $table->enum('iti_type', ['1', '2'])->default('1')->comment('1=itinerary,2=accommodation');
            $table->string('iti_package_type', 50)->nullable();
            $table->integer('is_amendment')->default(0)->comment('Is amendment in booked itinerary. 1=TRUE');
            $table->integer('parent_iti_id')->default(0);
            $table->longText('flight_details')->nullable();
            $table->longText('train_details')->nullable();
            $table->integer('customer_id');
            $table->string('temp_key', 50)->nullable();
            $table->string('publish_status', 20)->default('draft')->comment('draft,publish');
            $table->integer('is_flight')->default(0)->comment('0=No Flight, 1=true');
            $table->integer('is_train')->default(0)->comment('1=true');
            $table->string('package_name', 100)->nullable();
            $table->string('package_routing', 200)->nullable();
            $table->string('duration', 100)->nullable();
            $table->string('cab_category', 20)->nullable();
            $table->string('t_start_date', 30)->nullable()->comment('use for accommodation');
            $table->string('t_end_date', 30)->nullable()->comment('use for accommodation');
            $table->string('total_nights', 10)->nullable()->comment('use for accommodation');
            $table->string('total_travellers', 30)->nullable()->comment('adults,children,children age');
            $table->string('adults', 20)->nullable();
            $table->string('child', 20)->nullable();
            $table->string('child_age', 30)->nullable();
            $table->string('quatation_date', 20)->nullable();
            $table->string('total_kilometer', 20)->nullable();
            $table->string('rooms_meta', 200)->nullable();
            $table->longText('daywise_meta')->nullable();
            $table->text('inc_meta')->nullable();
            $table->text('special_inc_meta')->nullable();
            $table->text('booking_benefits_meta')->nullable();
            $table->text('exc_meta')->nullable();
            $table->text('hotel_meta')->nullable();
            $table->text('hotel_note_meta')->nullable();
            $table->text('rates_meta')->nullable();
            $table->integer('agent_price')->default(0)->comment('price increased by agent in %');
            $table->integer('discount_rate_request')->default(0)->comment('0=No, 1=Yes, 2=request to supermanager, 3=request to teamleader');
            $table->integer('pending_price')->default(0)->comment('1="price pending", 2="price updated", 4= "Request to super manager", 5=request to teamleader');
            $table->text('rates_note_meta')->nullable();
            $table->text('booking_des')->nullable();
            $table->text('booking_meta')->nullable();
            $table->integer('iti_status')->default(0)->comment('9=approve, 8=postpone, 7=decline, 6=rejected by manager');
            $table->string('followup_status', 20)->nullable();
            $table->string('decline_comment', 200)->nullable();
            $table->string('dis_hotel_cat', 100)->nullable();
            $table->string('iti_reject_comment', 200)->nullable();
            $table->longText('rate_comment')->nullable()->comment('comment added by manager during add price');
            $table->string('client_other_info', 255)->nullable();
            $table->text('iti_note')->nullable();
            $table->string('per_person_ratemeta')->nullable();
            $table->string('client_comment', 200)->nullable();
            $table->string('client_comment_status', 10)->default('0')->comment('0=read, 1=unread');
            $table->string('final_amount', 20)->nullable();
            $table->string('approved_package_category', 30)->nullable()->comment('Package Category of booked package');
            $table->integer('email_count')->nullable();
            $table->integer('del_status')->default(0);
            $table->integer('agent_id')->nullable();
            $table->timestamp('pending_price_date')->nullable()->comment('pending price sent request date');
            $table->timestamp('approved_price_date')->nullable()->comment('Approved price date by manager');
            $table->timestamp('iti_decline_approved_date')->nullable();
            $table->timestamp('quotation_sent_date')->nullable()->comment('Quotation Sent Date');
            $table->integer('iti_close_status')->default(0)->comment('1=itinerary Closed, payment received');
            $table->date('lead_created')->nullable()->comment('lead created date: when lead/customer created');
            $table->timestamps(0); // Use timestamps(0) to prevent updated_at and created_at from being updated on insert
            $table->timestamp('client_last_visit')->nullable();
            $table->integer('p_status')->nullable();
            $table->string('package_pdf_img', 255)->nullable();
            $table->text('requirements_meta')->nullable();
            $table->string('infant', 255)->nullable();
            $table->string('thumbimg', 225)->nullable();
            $table->string('pakage_starting_cost', 255)->nullable();
            $table->string('clone_child_iti', 11)->nullable();
            $table->integer('package_id')->nullable();
            $table->longText('extranote')->nullable();
            $table->integer('p_cat_id')->nullable();
            $table->string('train_flight_cab_price', 255)->nullable();
            $table->longText('destination_meta')->nullable();
            $table->longText('per_hotel_ratemeta')->nullable();
            $table->string('cab_rate_per', 255)->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('tour_start', 255)->nullable();
            $table->string('tour_end', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerary');
    }
};
