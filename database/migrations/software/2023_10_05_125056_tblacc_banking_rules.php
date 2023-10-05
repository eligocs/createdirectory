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
        Schema::create('tblacc_banking_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('transaction', 45)->nullable();
            $table->string('following', 45)->nullable();
            $table->string('then', 45)->nullable();
            $table->integer('payment_account')->nullable();
            $table->integer('deposit_to')->nullable();
            $table->boolean('auto_add')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_banking_rules');
    }
};
