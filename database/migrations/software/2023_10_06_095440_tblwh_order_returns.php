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
        Schema::create('tblwh_order_returns', function (Blueprint $table) {
            $table->id();
            $table->integer('rel_id')->nullable();
            $table->string('rel_type', 50)->comment('manual, sales_return_order, purchasing_return_order');
            $table->string('return_type', 50)->nullable()->comment('manual, partially, fully');
            $table->integer('company_id')->nullable();
            $table->string('company_name', 500)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phonenumber', 20)->nullable();
            $table->string('order_number', 500)->nullable();
            $table->datetime('order_date')->nullable();
            $table->decimal('number_of_item', 15, 2)->default(0.00);
            $table->decimal('order_total', 15, 2)->default(0.00);
            $table->string('order_return_number', 200)->nullable();
            $table->string('order_return_name', 500)->nullable();
            $table->decimal('fee_return_order', 15, 2)->default(0.00);
            $table->integer('refund_loyaty_point')->default(0);
            $table->decimal('subtotal', 15, 2)->default(0.00);
            $table->decimal('total_amount', 15, 2)->default(0.00);
            $table->decimal('discount_total', 15, 2)->default(0.00);
            $table->decimal('additional_discount', 15, 2)->default(0.00);
            $table->decimal('adjustment_amount', 15, 2)->default(0.00);
            $table->decimal('total_after_discount', 15, 2)->default(0.00);
            $table->text('return_policies_information')->nullable();
            $table->text('admin_note')->nullable();
            $table->integer('approval')->default(0);
            $table->datetime('datecreated')->nullable();
            $table->integer('staff_id')->nullable();
            $table->integer('currency')->nullable();
            $table->integer('receipt_delivery_id')->default(0);
            $table->longText('return_reason');
            $table->string('status', 30)->default('draft');
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblwh_order_returns');
    }
};
