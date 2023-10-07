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
        Schema::create('tblacc_reconciles', function (Blueprint $table) {
            $table->id();
            $table->integer('account');
            $table->decimal('beginning_balance', 15, 2);
            $table->decimal('ending_balance', 15, 2);
            $table->date('ending_date');
            $table->date('expense_date')->nullable();
            $table->decimal('service_charge', 15, 2)->nullable();
            $table->integer('expense_account')->nullable();
            $table->date('income_date')->nullable();
            $table->decimal('interest_earned', 15, 2)->nullable();
            $table->integer('income_account')->nullable();
            $table->integer('finish')->default(0);
            $table->integer('opening_balance')->default(0);
            $table->decimal('debits_for_period', 15, 2)->nullable();
            $table->decimal('credits_for_period', 15, 2)->nullable();
            $table->datetime('dateadded')->nullable();
            $table->integer('addedfrom')->nullable();
            $table->timestamps(); // You can include timestamps if needed.

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // //$table->foreign('account')->references('id')->on('your_account_table_name');
            // //$table->foreign('expense_account')->references('id')->on('your_expense_account_table_name');
            // //$table->foreign('income_account')->references('id')->on('your_income_account_table_name');
            // //$table->foreign('addedfrom')->references('id')->on('your_addedfrom_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_reconciles');
    }
};
