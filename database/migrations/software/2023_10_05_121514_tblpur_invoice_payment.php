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
        Schema::create('tblpur_invoice_payment', function (Blueprint $table) {
            $table->id();
            $table->integer('pur_invoice');
            $table->decimal('amount', 15, 2);
            $table->longText('paymentmode')->nullable();
            $table->date('date');
            $table->datetime('daterecorded');
            $table->text('note');
            $table->mediumText('transactionid')->nullable();
            $table->integer('approval_status')->nullable();
            $table->integer('requester')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_invoice_payment');
    }
};
