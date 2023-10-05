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
        Schema::create('ac_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->nullable(); 
            $table->string('financial_year')->nullable();  
            $table->string('invoice_no')->nullable();  
            $table->string('lead_id')->nullable();  
            $table->string('agent_id')->nullable();  
            $table->timestamp('created')->default('default_value'); 
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_invoices');
    }
};
