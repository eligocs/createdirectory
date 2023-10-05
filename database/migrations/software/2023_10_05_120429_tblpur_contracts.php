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
        Schema::create('tblpur_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('contract_number', 200);
            $table->string('contract_name', 200);
            $table->longText('content')->nullable();
            $table->integer('vendor');
            $table->integer('pur_order');
            $table->decimal('contract_value', 15, 2)->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('buyer')->nullable();
            $table->date('time_payment')->nullable();
            $table->integer('add_from');
            $table->integer('signed')->default(0);
            $table->longText('note')->nullable();
            $table->integer('signer')->nullable();
            $table->date('signed_date')->nullable();
            $table->string('signed_status', 50)->nullable();
            $table->text('service_category')->nullable();
            $table->integer('project')->nullable();
            $table->text('payment_terms')->nullable();
            $table->decimal('payment_amount', 15, 2)->nullable();
            $table->string('payment_cycle', 50)->nullable();
            $table->integer('department')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_contracts');
    }
};
