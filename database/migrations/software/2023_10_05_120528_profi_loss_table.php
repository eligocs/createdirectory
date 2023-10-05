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
        Schema::create('profi_loss_table', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sellingPrice')->nullable();
            $table->integer('iti_id');
            $table->float('total_margin_cost')->nullable();
            $table->float('total_margin_per')->nullable();
            $table->float('total_cost')->nullable();
            $table->string('cab_price', 255)->default('0');
            $table->string('hotel_price', 255)->default('0');
            $table->string('volvo_price', 255)->default('0');
            $table->string('flight_price', 255)->default('0');
            $table->string('train_price', 255)->default('0');
            $table->string('other_price', 255)->default('0');
            $table->integer('is_loss_profit')->nullable()->comment('1=profit,2=loss');
            $table->integer('cust_id')->nullable();
            $table->integer('agent_id')->nullable();
            $table->string('withoutMrg', 255)->nullable();
            $table->timestamp('iti_decline_approved_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profi_loss_table');
    }
};
