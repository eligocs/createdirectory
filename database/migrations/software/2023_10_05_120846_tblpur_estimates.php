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
        Schema::create('tblpur_estimates', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('sent')->default(0);
            $table->dateTime('datesend')->nullable();
            $table->integer('vendor');
            $table->string('deleted_vendor_name', 100)->nullable();
            $table->integer('pur_request')->nullable();
            $table->integer('number');
            $table->string('prefix', 50)->nullable();
            $table->integer('number_format')->default(0);
            $table->string('hash', 32)->nullable();
            $table->dateTime('datecreated');
            $table->date('date');
            $table->date('expirydate')->nullable();
            $table->integer('currency');
            $table->decimal('subtotal', 15, 2);
            $table->decimal('total_tax', 15, 2);
            $table->decimal('total', 15, 2);
            $table->decimal('adjustment', 15, 2)->nullable();
            $table->integer('addedfrom');
            $table->integer('status')->default(1);
            $table->text('vendornote')->nullable();
            $table->text('adminnote')->nullable();
            $table->decimal('discount_percent', 15, 2)->default(0.00);
            $table->decimal('discount_total', 15, 2)->default(0.00);
            $table->string('discount_type', 30)->nullable();
            $table->integer('invoiceid')->nullable();
            $table->dateTime('invoiced_date')->nullable();
            $table->text('terms')->nullable();
            $table->string('reference_no', 100)->nullable();
            $table->integer('buyer')->default(0);
            $table->string('billing_street', 200)->nullable();
            $table->string('billing_city', 100)->nullable();
            $table->string('billing_state', 100)->nullable();
            $table->string('billing_zip', 100)->nullable();
            $table->integer('billing_country')->nullable();
            $table->string('shipping_street', 200)->nullable();
            $table->string('shipping_city', 100)->nullable();
            $table->string('shipping_state', 100)->nullable();
            $table->string('shipping_zip', 100)->nullable();
            $table->integer('shipping_country')->nullable();
            $table->tinyInteger('include_shipping');
            $table->tinyInteger('show_shipping_on_estimate')->default(1);
            $table->integer('show_quantity_as')->default(1);
            $table->integer('pipeline_order')->default(0);
            $table->integer('is_expiry_notified')->default(0);
            $table->string('acceptance_firstname', 50)->nullable();
            $table->string('acceptance_lastname', 50)->nullable();
            $table->string('acceptance_email', 100)->nullable();
            $table->dateTime('acceptance_date')->nullable();
            $table->string('acceptance_ip', 40)->nullable();
            $table->string('signature', 40)->nullable();
            $table->text('make_a_contract')->nullable();
            $table->decimal('currency_rate', 15, 6)->nullable();
            $table->string('from_currency', 20)->nullable();
            $table->string('to_currency', 20)->nullable();
            $table->decimal('shipping_fee', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_estimates');
    }
};
