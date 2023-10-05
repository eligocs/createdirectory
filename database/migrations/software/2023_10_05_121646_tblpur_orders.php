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
        Schema::create('tblpur_orders', function (Blueprint $table) {
            $table->id();
            $table->string('pur_order_name', 100);
            $table->integer('vendor');
            $table->integer('estimate');
            $table->string('pur_order_number', 30);
            $table->date('order_date');
            $table->integer('status');
            $table->integer('approve_status');
            $table->datetime('datecreated');
            $table->integer('days_owed');
            $table->date('delivery_date')->nullable();
            $table->decimal('subtotal', 15, 2);
            $table->decimal('total_tax', 15, 2);
            $table->decimal('total', 15, 2);
            $table->integer('addedfrom');
            $table->text('vendornote')->nullable();
            $table->text('terms')->nullable();
            $table->decimal('discount_percent', 15, 2)->default(0.00);
            $table->decimal('discount_total', 15, 2)->default(0.00);
            $table->string('discount_type', 30)->nullable();
            $table->integer('buyer')->default(0);
            $table->integer('status_goods')->default(0);
            $table->integer('number')->nullable();
            $table->integer('expense_convert')->default(0);
            $table->string('hash', 32)->nullable();
            $table->text('clients')->nullable();
            $table->integer('delivery_status')->default(0);
            $table->text('type')->nullable();
            $table->integer('project')->nullable();
            $table->integer('pur_request')->nullable();
            $table->integer('department')->nullable();
            $table->decimal('tax_order_rate', 15, 2)->nullable();
            $table->decimal('tax_order_amount', 15, 2)->nullable();
            $table->integer('sale_invoice')->nullable();
            $table->integer('currency')->default(0);
            $table->string('order_status', 30)->nullable();
            $table->text('shipping_note')->nullable();
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
        Schema::dropIfExists('tblpur_orders');
    }
};
