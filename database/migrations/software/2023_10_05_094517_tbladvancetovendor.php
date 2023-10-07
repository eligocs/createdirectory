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
        Schema::create('tbladvancetovendor', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id')->nullable();
            $table->integer('transporters_id')->nullable();
            $table->integer('totalAmount')->nullable();
            $table->string('paymentSourceCode', 255)->nullable();
            $table->string('transactionCode', 255)->nullable();
            $table->string('currencyCode', 255)->nullable();
            $table->timestamp('from_date', 6)->nullable()->default(now());
            $table->integer('in_status')->nullable();
            $table->integer('total_tax')->nullable();
            $table->string('notes', 255)->nullable();
            $table->timestamps(); // You can include timestamps if needed.

            // If you want to set the charset and engine:
            // $table->charset = 'latin1';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // //$table->foreign('hotel_id')->references('id')->on('your_hotel_table_name');
            // //$table->foreign('transporters_id')->references('id')->on('your_transporters_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbladvancetovendor');
    }
};
