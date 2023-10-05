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
        Schema::create('ac_customer_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable(); 
            $table->string('customer_email')->nullable(); 
            $table->string('customer_contact')->nullable(); 
            $table->string('alternate_contact_number')->nullable(); 
            $table->string('address')->nullable(); 
            $table->integer('state_id')->nullable(); 
            $table->integer('place_of_supply_state_id')->nullable(); 
            $table->string('client_gst')->nullable(); 
            $table->integer('country_id')->nullable(); 
            $table->text('remarks')->nullable(); 
            $table->integer('status')->default(0)->comment('1 = blacklist'); 
            $table->integer('del_status')->default(0); 
            $table->integer('updated_by')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_customer_accounts');
    }
};
