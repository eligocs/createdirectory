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
        Schema::create('tblacc_plaid_transaction_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('bank_id')->nullable();
            $table->date('last_updated')->nullable();
            $table->integer('transaction_count')->nullable();
            // $table->datetime('created_at')->nullable();
            $table->integer('addedFrom')->nullable();
            $table->integer('company')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps(); // You can include timestamps if needed.

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // //$table->foreign('bank_id')->references('id')->on('your_bank_table_name');
            // //$table->foreign('addedFrom')->references('id')->on('your_addedFrom_table_name');
            // //$table->foreign('company')->references('id')->on('your_company_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_plaid_transaction_logs');
    }
};
