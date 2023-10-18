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
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_title', 100);
            $table->string('admin_email', 100);
            $table->string('manager_email', 100);
            $table->integer('tax');
            $table->string('super_manager_email', 100);
            $table->string('sales_team_name', 100);
            $table->string('sales_team_contact', 100);
            $table->string('sales_email', 100);
            $table->string('hotel_team_name', 100);
            $table->string('hotel_team_contact', 100);
            $table->string('hotel_email', 100);
            $table->string('vehicle_email', 100);
            $table->string('vehicle_team_name', 100);
            $table->string('vehicle_team_contact', 100);
            $table->string('company_contact', 200);
            $table->string('company_email', 200);
            $table->text('company_info');
            $table->longtext('who_we_are');
            $table->text('what_we_do');
            $table->text('why_choose_us');
            $table->text('tagline');
            $table->text('standard_login');
            $table->tinyInteger('online_payments')->default(0);
            $table->timestamp('updated')->default(\DB::raw('current_timestamp() on update current_timestamp()'));
            $table->string('site_link', 500);
            $table->integer('agent_discount')->nullable();
            $table->string('pdf_img')->nullable();
            $table->integer('agent_margin')->nullable();
            $table->text('otp_based_login')->nullable();
            $table->integer('modules_type')->default(0);
            $table->string('countryids')->nullable();
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
