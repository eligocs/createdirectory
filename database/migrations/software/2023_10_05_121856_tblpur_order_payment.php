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
        Schema::create('tblpur_order_payment', function (Blueprint $table) {
            $table->id();
            $table->integer('pur_order')->unsigned();
            $table->decimal('amount', 15, 2);
            $table->longText('paymentmode')->nullable();
            $table->date('date');
            $table->datetime('daterecorded');
            $table->text('note');
            $table->mediumText('transactionid')->nullable();

            //$table->foreign('pur_order')->references('id')->on('tblpur_orders')->onDelete('cascade');
            // Add any other foreign keys here if necessary

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_order_payment');
    }
};
