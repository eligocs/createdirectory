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
        Schema::create('tblpur_debits_refunds', function (Blueprint $table) {
            $table->id();
            $table->integer('debit_note_id')->nullable();
            $table->integer('staff_id')->nullable();
            $table->date('refunded_on')->nullable();
            $table->string('payment_mode', 40)->nullable();
            $table->text('note')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_debits_refunds');
    }
};
