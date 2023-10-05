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
        Schema::create('tblinvoicepaymentrecords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoiceid')->nullable();
            $table->decimal('amount', 15, 2);
            $table->string('paymentmode', 40)->nullable();
            $table->string('paymentmethod', 191)->nullable();
            $table->timestamp('date')->default(now());
            $table->dateTime('daterecorded')->default(now());
            $table->text('note');
            $table->mediumText('transactionid')->nullable();
            $table->unsignedBigInteger('cust_id')->nullable();
            $table->unsignedBigInteger('iti_id')->nullable();

            // Define foreign key constraints
            $table->foreign('invoiceid')->references('id')->on('tblinvoices')->onDelete('set null');
            $table->foreign('cust_id')->references('id')->on('tblcustomers')->onDelete('set null');
            $table->foreign('iti_id')->references('id')->on('tblinvoice_items')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblinvoicepaymentrecords');
    }
};
