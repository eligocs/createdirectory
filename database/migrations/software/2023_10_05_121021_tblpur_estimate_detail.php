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
        Schema::create('tblpur_estimate_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('pur_estimate');
            $table->string('item_code', 100);
            $table->integer('unit_id')->nullable();
            $table->decimal('unit_price', 15, 2)->nullable();
            $table->decimal('quantity', 15, 2);
            $table->decimal('into_money', 15, 2)->nullable();
            $table->text('tax')->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->decimal('total_money', 15, 2)->nullable();
            $table->decimal('discount_money', 15, 2)->nullable();
            $table->decimal('discount_', 15, 2)->nullable();
            $table->decimal('tax_value', 15, 2)->nullable();
            $table->text('tax_rate')->nullable();
            $table->text('tax_name')->nullable();
            $table->text('item_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_estimate_detail');
    }
};
