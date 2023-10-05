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
        Schema::create('payment_refund', function (Blueprint $table) {
            $table->increments('tra_id');
            $table->integer('iti_id');
            $table->string('refund_amount', 10);
            $table->string('payment_type', 200)->comment('cash/cheque');
            $table->string('bank_name', 200);
            $table->integer('agent_id');
            $table->timestamp('created')->default(\DB::raw('current_timestamp()'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_refund');
    }
};
