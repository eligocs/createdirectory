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
        Schema::create('tblacc_matched_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('account_history_id')->nullable();
            $table->decimal('history_amount', 15, 2)->default(0.00);
            $table->integer('rel_id')->nullable();
            $table->string('rel_type', 255)->nullable();
            $table->decimal('amount', 15, 2)->default(0.00);
            $table->integer('company')->nullable();
            $table->integer('reconcile')->default(0);
            $table->timestamps(); // You can include timestamps if needed.

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // //$table->foreign('account_history_id')->references('id')->on('your_account_history_table_name');
            // //$table->foreign('rel_id')->references('id')->on('your_rel_table_name');
            // //$table->foreign('company')->references('id')->on('your_company_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_matched_transactions');
    }
};
