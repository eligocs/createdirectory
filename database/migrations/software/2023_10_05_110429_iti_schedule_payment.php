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
        Schema::create('iti_schedule_payment', function (Blueprint $table) {
            $table->id();
            $table->string('meta_key', 255);
            $table->string('meta_val', 255);
            $table->unsignedBigInteger('iti_id');
            $table->timestamp('created_Date', 6)->useCurrent();
            $table->integer('payment_status')->default(0)->comment('0=not paid, 1=paid, 2=partially paid');
            $table->date('payment_due_date')->nullable();

            //$table->foreign('iti_id')->references('iti_id')->on('itinerary'); // Assuming 'itinerary' is the related table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iti_schedule_payment');
    }
};
