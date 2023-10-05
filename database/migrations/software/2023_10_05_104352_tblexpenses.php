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
        Schema::create('tblexpenses', function (Blueprint $table) {
            $table->id();
            $table->integer('category');
            $table->integer('currency');
            $table->decimal('amount', 15, 2);
            $table->integer('tax')->nullable();
            $table->integer('tax2')->default(0);
            $table->string('reference_no', 100)->nullable();
            $table->text('note')->nullable();
            $table->string('expense_name', 191)->nullable();
            $table->integer('clientid');
            $table->integer('project_id')->default(0);
            $table->integer('billable')->default(0);
            $table->integer('invoiceid')->nullable();
            $table->string('paymentmode', 50)->nullable();
            $table->date('date');
            $table->string('recurring_type', 10)->nullable();
            $table->integer('repeat_every')->nullable();
            $table->integer('recurring')->default(0);
            $table->integer('cycles')->default(0);
            $table->integer('total_cycles')->default(0);
            $table->integer('custom_recurring')->default(0);
            $table->date('last_recurring_date')->nullable();
            $table->tinyInteger('create_invoice_billable')->nullable();
            $table->tinyInteger('send_invoice_to_customer')->default(0);
            $table->integer('recurring_from')->nullable();
            $table->datetime('dateadded');
            $table->integer('addedfrom');
            $table->integer('vendor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblexpenses');
    }
};
