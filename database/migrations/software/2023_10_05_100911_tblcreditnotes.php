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
        Schema::create('tblcreditnotes', function (Blueprint $table) {
            $table->id();
            $table->integer('clientid');
            $table->string('deleted_customer_name', 100)->nullable();
            $table->integer('number');
            $table->string('prefix', 50)->nullable();
            $table->integer('number_format')->default(1);
            $table->datetime('datecreated');
            $table->date('date');
            $table->text('adminnote')->nullable();
            $table->text('terms')->nullable();
            $table->text('clientnote')->nullable();
            $table->integer('currency');
            $table->decimal('subtotal', 15, 2);
            $table->decimal('total_tax', 15, 2)->default(0.00);
            $table->decimal('total', 15, 2);
            $table->decimal('adjustment', 15, 2)->nullable();
            $table->integer('addedfrom')->nullable();
            $table->integer('status')->default(1);
            $table->integer('project_id')->default(0);
            $table->decimal('discount_percent', 15, 2)->default(0.00);
            $table->decimal('discount_total', 15, 2)->default(0.00);
            $table->string('discount_type', 30);
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
            $table->tinyInteger('include_shipping');
            $table->tinyInteger('show_shipping_on_credit_note')->default(1);
            $table->integer('show_quantity_as')->default(1);
            $table->string('reference_no', 100)->nullable();

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // //$table->foreign('clientid')->references('id')->on('tblclients');
            // //$table->foreign('currency')->references('id')->on('tblcurrencies');
            // //$table->foreign('addedfrom')->references('id')->on('your_addedfrom_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcreditnotes');
    }
};
