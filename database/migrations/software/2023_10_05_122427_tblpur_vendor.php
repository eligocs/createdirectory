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
        Schema::create('tblpur_vendor', function (Blueprint $table) {
            $table->id('userid');
            $table->string('company', 200)->nullable();
            $table->string('vat', 200)->nullable();
            $table->string('phonenumber', 30)->nullable();
            $table->integer('country')->default(0);
            $table->string('city', 100)->nullable();
            $table->string('zip', 15)->nullable();
            $table->string('state', 50)->nullable();
            $table->text('address')->nullable();
            $table->string('website', 150)->nullable();
            $table->datetime('datecreated');
            $table->integer('active')->default(1);
            $table->integer('leadid')->nullable();
            $table->string('billing_street', 200)->nullable();
            $table->string('billing_city', 100)->nullable();
            $table->string('billing_state', 100)->nullable();
            $table->string('billing_zip', 100)->nullable();
            $table->integer('billing_country')->default(0);
            $table->string('shipping_street', 200)->nullable();
            $table->string('shipping_city', 100)->nullable();
            $table->string('shipping_state', 100)->nullable();
            $table->string('shipping_zip', 100)->nullable();
            $table->integer('shipping_country')->default(0);
            $table->string('longitude', 191)->nullable();
            $table->string('latitude', 191)->nullable();
            $table->string('default_language', 40)->nullable();
            $table->integer('default_currency')->default(0);
            $table->integer('show_primary_contact')->default(0);
            $table->string('stripe_id', 40)->nullable();
            $table->integer('registration_confirmed')->default(1);
            $table->integer('addedfrom')->default(0);
            $table->text('category')->nullable();
            $table->text('bank_detail')->nullable();
            $table->text('payment_terms')->nullable();
            $table->string('vendor_code', 100)->nullable();
            $table->integer('return_within_day')->nullable();
            $table->decimal('return_order_fee', 15, 2)->nullable();
            $table->text('return_policies')->nullable();
            $table->string('transpoterId', 11)->nullable();
            $table->integer('hotel_id')->nullable();
            $table->integer('other_vendor_id')->nullable();

            // Add any other columns or constraints here if necessary

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_vendor');
    }
};
