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
        Schema::create('tblwh_order_return_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_return_id')->unsigned();
            $table->integer('rel_type_detail_id')->nullable();
            $table->integer('commodity_code')->nullable();
            $table->text('commodity_name');
            $table->decimal('quantity', 15, 2)->default(0.00);
            $table->integer('unit_id')->nullable();
            $table->decimal('unit_price', 15, 2)->default(0.00);
            $table->decimal('sub_total', 15, 2)->default(0.00);
            $table->text('tax_id');
            $table->text('tax_rate');
            $table->text('tax_name');
            $table->decimal('total_amount', 15, 2)->default(0.00);
            $table->decimal('discount', 15, 2)->default(0.00);
            $table->decimal('discount_total', 15, 2)->default(0.00);
            $table->decimal('total_after_discount', 15, 2)->default(0.00);
            $table->string('reason_return', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblwh_order_return_details');
    }
};
