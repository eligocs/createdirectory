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
        Schema::create('tblpur_debit_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('vendorid')->nullable();
            $table->string('deleted_vendor_name', 100)->nullable();
            $table->integer('number')->nullable();
            $table->string('prefix', 50)->nullable();
            $table->integer('number_format')->nullable();
            $table->dateTime('datecreated')->nullable();
            $table->date('date')->nullable();
            $table->text('adminnote')->nullable();
            $table->text('terms')->nullable();
            $table->text('vendornote')->nullable();
            $table->integer('currency')->nullable();
            $table->decimal('subtotal', 15, 2)->nullable();
            $table->decimal('total_tax', 15, 2)->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->decimal('adjustment', 15, 2)->nullable();
            $table->integer('addedfrom')->nullable();
            $table->integer('status')->nullable();
            $table->decimal('discount_percent', 15, 2)->nullable();
            $table->decimal('discount_total', 15, 2)->nullable();
            $table->string('discount_type', 30)->nullable();
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
            $table->tinyInteger('include_shipping')->nullable();
            $table->tinyInteger('show_shipping_on_debit_note')->nullable();
            $table->integer('show_quantity_as')->nullable();
            $table->string('reference_no', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_debit_notes');
    }
};
