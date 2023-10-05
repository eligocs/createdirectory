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
        Schema::create('ac_booking_reference_details', function (Blueprint $table) {
            $table->id();
            $table->string('cus_account_id')->comment('ac_customer_accounts.id')->nullable(); 
            $table->string('iti_id')->nullable(); 
            $table->string('lead_id')->nullable(); 
            $table->string('close_account')->default(0)->comment('1=closed'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_booking_reference_details');
    }
};
