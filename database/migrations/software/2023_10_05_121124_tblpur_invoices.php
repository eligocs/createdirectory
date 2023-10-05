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
        Schema::create('tblpur_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->text('invoice_number')->nullable();
            $table->date('invoice_date')->nullable();
            $table->decimal('subtotal', 15, 2)->nullable();
            $table->integer('tax_rate')->nullable();
            $table->decimal('tax', 15, 2)->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->integer('contract')->nullable();
            $table->integer('vendor')->nullable();
            $table->mediumText('transactionid')->nullable();
            $table->date('transaction_date')->nullable();
            $table->string('payment_request_status', 30)->nullable();
            $table->string('payment_status', 30)->nullable();
            $table->text('vendor_note')->nullable();
            $table->text('adminnote')->nullable();
            $table->text('terms')->nullable();
            $table->integer('add_from')->nullable();
            $table->date('date_add')->nullable();
            $table->integer('pur_order')->nullable();
            $table->integer('recurring')->nullable();
            $table->string('recurring_type', 10)->nullable();
            $table->integer('cycles')->default(0);
            $table->integer('total_cycles')->default(0);
            $table->date('last_recurring_date')->nullable();
            $table->integer('is_recurring_from')->nullable();
            $table->date('duedate')->nullable();
            $table->string('add_from_type', 20)->nullable();
            $table->integer('currency')->default(0);
            $table->decimal('discount_total', 15, 2)->nullable();
            $table->decimal('discount_percent', 15, 2)->nullable();
            $table->decimal('currency_rate', 15, 6)->nullable();
            $table->string('from_currency', 20)->nullable();
            $table->string('to_currency', 20)->nullable();
            $table->decimal('shipping_fee', 15, 2)->nullable();
            $table->string('vendorCat', 255)->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('booking_id')->nullable();
            $table->integer('booking_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_invoices');
    }
};
