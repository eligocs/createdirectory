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
        Schema::create('iti_payment_transactions', function (Blueprint $table) {
            $table->id('tra_id');
            $table->unsignedBigInteger('iti_id');
            $table->string('payment_received', 200);
            $table->string('payment_type', 200)->comment('cash/cheque');
            $table->string('bank_name', 200);
            $table->string('invoice_date', 30);
            $table->unsignedBigInteger('agent_id');
            $table->timestamps(0); // Disable Laravel's default created_at and updated_at columns

            $table->foreign('iti_id')->references('iti_id')->on('itinerary'); // Assuming 'itinerary' is the related table
            $table->foreign('agent_id')->references('id')->on('agents'); // Assuming 'agents' is the related table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iti_payment_transactions');
    }
};
