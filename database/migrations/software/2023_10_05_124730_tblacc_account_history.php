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
        Schema::create('tblacc_account_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account')->nullable();
            $table->decimal('debit', 15, 2)->default(0.00);
            $table->decimal('credit', 15, 2)->default(0.00);
            $table->text('description')->nullable();
            $table->integer('rel_id')->nullable();
            $table->string('rel_type', 45)->nullable();
            $table->datetime('datecreated')->nullable();
            $table->integer('addedfrom')->nullable();
            $table->integer('customer')->nullable();
            $table->integer('reconcile')->default(0);
            $table->integer('split')->default(0);
            $table->integer('item')->nullable();
            $table->integer('paid')->default(0);
            $table->date('date')->nullable();
            $table->integer('tax')->default(0);
            $table->string('payslip_type', 45)->nullable();
            $table->integer('vendor')->nullable();
            $table->integer('itemable_id')->nullable();
            $table->integer('cleared')->default(0);
            $table->integer('cust_id')->nullable();
            $table->integer('inv_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_account_history');
    }
};
