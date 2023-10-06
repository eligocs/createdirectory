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
        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->string('term_type', 10)->comment('term type = "itinerary/hotel/cab"');
            $table->longText('bank_payment_terms_content');
            $table->longText('cancel_content');
            $table->longText('terms_content');
            $table->longText('book_package');
            $table->longText('advance_payment_terms')->nullable();
            $table->longText('amendment_policy');
            $table->text('disclaimer_content');
            $table->longText('promotion_signature');
            $table->longText('hotel_notes');
            $table->longText('rates_dates_notes');
            $table->longText('hotel_exclusion');
            $table->longText('greeting_message');
            $table->longText('payment_policy')->comment('after receiving booking cost')->nullable();
            $table->text('booking_benefits_terms')->nullable();
            $table->longText('hotel_inclusion');
            $table->timestamp('updated')->default(now())->onUpdate(now());

            // Additional indexes or foreign key constraints can be added if needed.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms');
    }
};
