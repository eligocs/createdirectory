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
        Schema::create('ac_receipts', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_type', 20);
            $table->string('voucher_number', 50)->nullable()->comment('prefix: BR = bank, CR=carsh receipt');
            $table->date('voucher_date')->nullable();
            $table->string('account_type_id', 50);
            $table->bigInteger('customer_acc_id');
            $table->bigInteger('lead_id');
            $table->string('transfer_type', 255);
            $table->string('transfer_ref', 100)->nullable();
            $table->date('transfer_date');
            $table->text('narration')->nullable();
            $table->float('amount_received', 20, 2);
            $table->bigInteger('agent_id');
            $table->tinyInteger('sent_count')->default(0)->comment('how many times sent to client');
            $table->tinyInteger('del_status')->default(0);
            $table->timestamps(); // Adds 'created_at' and 'updated_at' timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_receipts');
    }
};
