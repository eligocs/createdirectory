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
        Schema::create('iti_before_amendment', function (Blueprint $table) {
            $table->id();
            $table->integer('iti_id');
            $table->enum('iti_type', ['1', '2'])->default('1')->comment('1=itinerary,2=accommodation');
            $table->string('temp_key', 50)->nullable();
            $table->integer('customer_id')->nullable();
            $table->string('package_name', 100)->nullable();
            $table->string('package_routing', 100)->nullable();
            $table->string('duration', 50)->nullable();
            $table->string('cab_category', 10)->nullable();
            $table->string('adults', 20)->nullable();
            $table->string('child', 20)->nullable();
            $table->string('child_age', 50)->nullable();
            $table->string('t_start_date', 30)->nullable()->comment('use for accommodation');
            $table->string('t_end_date', 30)->nullable()->comment('use for accommodation');
            $table->string('total_nights', 10)->nullable()->comment('use for accommodation');
            $table->longText('daywise_meta')->nullable();
            $table->text('rooms_meta')->nullable();
            $table->text('inc_meta')->nullable();
            $table->text('special_inc_meta')->nullable();
            $table->text('booking_benefits_meta')->nullable();
            $table->text('exc_meta')->nullable();
            $table->text('hotel_meta')->nullable();
            $table->text('hotel_note_meta')->nullable();
            $table->string('old_package_cost', 11)->nullable();
            $table->string('new_package_cost', 11)->nullable();
            $table->string('approved_package_category', 20)->nullable();
            $table->integer('sent_for_review')->default(0)->comment('0=not sent, 1=sent to manager, 2=reviewed by manager, 3=updated by agent');
            $table->string('review_comment', 200)->nullable()->comment('Short comment to manager by agent for amendment reason');
            $table->timestamp('review_update_date')->nullable();
            $table->integer('del_status')->nullable();
            $table->integer('agent_id')->nullable();
            $table->timestamps();
            $table->integer('infant')->nullable();
            $table->string('package_pdf_img', 255)->nullable();
            $table->string('requirements_meta', 255)->nullable();
            $table->string('thumbimg', 255)->nullable();
            $table->string('pakage_starting_cost', 255)->nullable();
            $table->string('clone_child_iti', 255)->nullable();
            $table->integer('package_id')->nullable();
            $table->longText('extranote')->nullable();
            $table->integer('p_cat_id')->nullable();
            $table->string('train_flight_cab_price', 255)->nullable();
            $table->string('discount_agent_update', 255)->nullable();
            $table->integer('self_update')->nullable();
            $table->longText('destination_meta')->nullable();
            $table->longText('per_hotel_ratemeta')->nullable();
            $table->string('cab_rate_per', 255)->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('tour_start', 255)->nullable();
            $table->string('tour_end', 255)->nullable();
            $table->integer('is_flight')->default(0);
            $table->integer('is_train')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iti_before_amendment');
    }
};
