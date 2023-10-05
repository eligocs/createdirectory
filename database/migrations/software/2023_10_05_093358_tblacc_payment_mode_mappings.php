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
        Schema::create('tblacc_payment_mode_mappings', function (Blueprint $table) {
            $table->id();
            $table->integer('payment_mode_id');
            $table->integer('payment_account')->default(0);
            $table->integer('deposit_to')->default(0);
            $table->integer('expense_payment_account')->default(0);
            $table->integer('expense_deposit_to')->default(0);
            $table->timestamps(); // You can include timestamps if needed.

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // $table->foreign('payment_mode_id')->references('id')->on('your_payment_mode_table_name');
            // $table->foreign('payment_account')->references('id')->on('your_payment_account_table_name');
            // $table->foreign('deposit_to')->references('id')->on('your_deposit_to_table_name');
            // $table->foreign('expense_payment_account')->references('id')->on('your_expense_payment_account_table_name');
            // $table->foreign('expense_deposit_to')->references('id')->on('your_expense_deposit_to_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_payment_mode_mappings');
    }
};
