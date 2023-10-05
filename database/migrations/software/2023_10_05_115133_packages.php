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
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('package_id');
            $table->string('temp_key', 50);
            $table->string('publish_status', 20)->default('draft')->comment('draft,publish');
            $table->integer('city_id');
            $table->integer('state_id');
            $table->string('package_name', 100)->nullable();
            $table->string('package_routing', 200)->nullable();
            $table->string('duration', 100)->nullable();
            $table->string('cab_category', 100)->nullable();
            $table->string('adults', 100)->nullable();
            $table->string('child', 100)->nullable();
            $table->string('child_age', 100)->nullable();
            $table->string('total_kilometer', 200)->nullable();
            $table->longText('daywise_meta')->nullable();
            $table->text('inc_meta')->nullable();
            $table->text('special_inc_meta')->nullable();
            $table->text('exc_meta')->nullable();
            $table->text('hotel_meta')->nullable();
            $table->text('hotel_note_meta')->nullable();
            $table->integer('p_status')->default(0)->comment('0=unapproved,1=approved');
            $table->text('rates_meta')->nullable();
            $table->string('dis_hotel_cat', 200)->nullable();
            $table->integer('del_status')->default(0);
            $table->integer('agent_id')->nullable();
            $table->timestamp('created')->default(\DB::raw('current_timestamp()'));
            $table->string('package_pdf_img', 255)->nullable();
            $table->string('thumbimg', 255)->nullable();
            $table->string('pakage_starting_cost', 255)->nullable();
            $table->integer('country_id')->nullable();
            $table->string('tour_start', 255)->nullable();
            $table->string('tour_end', 255)->nullable();
            $table->integer('p_cat_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
