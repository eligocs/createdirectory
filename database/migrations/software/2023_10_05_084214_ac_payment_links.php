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
        Schema::create('ac_payment_links', function (Blueprint $table) {
            $table->id();
            $table->string('link_token', 50)->nullable();
            $table->string('order_id', 50)->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('iti_id')->nullable();
            $table->decimal('trans_amount', 18, 2)->nullable();
            $table->timestamp('link_expire_date')->nullable();
            $table->unsignedBigInteger('agent_id');
            $table->tinyInteger('status')->default(0)->comment('1 = del');
            $table->tinyInteger('paid_status')->default(0)->comment('1=paid');
            $table->timestamps(0);  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_payment_links');
    }
};
