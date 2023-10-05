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
        Schema::create('ac_online_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_id', 50);
            $table->string('payment_temp_token', 80);
            $table->integer('customer_id');
            $table->integer('iti_id');
            $table->string('customer_name', 50);
            $table->string('customer_contact', 20);
            $table->string('customer_email', 50);
            $table->text('description');
            $table->string('trans_id', 255);
            $table->float('trans_amount', 18, 2);
            $table->string('payment_mode', 50);
            $table->string('currency', 10);
            $table->timestamp('trans_date')->useCurrent();
            $table->string('trans_status', 20);
            $table->integer('t_response_code');
            $table->string('t_response_msg', 255);
            $table->string('gatwayname', 20);
            $table->string('bank_trans_id', 100);
            $table->string('bank_name', 255);
            $table->string('client_ip', 50);
            $table->timestamp('created')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_online_transactions');
    }
};
