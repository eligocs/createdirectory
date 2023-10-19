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
        Schema::create('tblpur_request_detail', function (Blueprint $table) {
            $table->id('prd_id');
            $table->integer('pur_request');
            $table->string('item_code', 100);
            $table->integer('unit_id')->nullable();
            $table->decimal('unit_price', 15, 2)->nullable();
            $table->decimal('quantity', 15, 2);
            $table->decimal('into_money', 15, 2)->nullable();
            $table->integer('inventory_quantity')->default(0);
            $table->text('item_text')->nullable();
            $table->text('tax')->nullable();
            $table->text('tax_rate')->nullable();
            $table->decimal('tax_value', 15, 2)->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->text('tax_name')->nullable();

            // Add any other columns and foreign keys here if necessary

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_request_detail');
    }
};
