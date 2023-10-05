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
        Schema::create('tblpayment', function (Blueprint $table) {
            $table->id();
            $table->integer('cust_id');
            $table->integer('transactionCode')->nullable();
            $table->string('totalAmount', 255)->nullable();
            $table->string('paymentSourceCode', 255)->nullable();
            $table->string('transactionReference', 255)->nullable();
            $table->string('currencyCode', 255)->nullable();
            $table->string('notes', 255)->nullable();
            $table->timestamp('from_date')->nullable()->default(now());
            $table->integer('in_status')->default(0);
            $table->string('total_tax', 255)->nullable();
            $table->string('payment_split', 255)->nullable();
            $table->integer('iti_id')->nullable();
            $table->integer('schedule_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpayment');
    }
};
