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
        Schema::create('tblpur_request', function (Blueprint $table) {
            $table->id();
            $table->string('pur_rq_code', 45);
            $table->string('pur_rq_name', 100);
            $table->text('rq_description')->nullable();
            $table->integer('requester');
            $table->integer('department');
            $table->datetime('request_date');
            $table->integer('status')->nullable();
            $table->integer('status_goods')->default(0);
            $table->string('hash', 32)->nullable();
            $table->text('type')->nullable();
            $table->integer('project')->nullable();
            $table->integer('number')->nullable();
            $table->integer('from_items')->default(1);
            $table->decimal('subtotal', 15, 2)->nullable();
            $table->decimal('total_tax', 15, 2)->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->integer('sale_invoice')->nullable();
            $table->text('compare_note')->nullable();
            $table->text('send_to_vendors')->nullable();
            $table->integer('currency')->default(0);
            $table->decimal('currency_rate', 15, 6)->nullable();
            $table->string('from_currency', 20)->nullable();
            $table->string('to_currency', 20)->nullable();
            $table->integer('sale_estimate')->nullable();

            // Add any other columns and foreign keys here if necessary

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_request');
    }
};
