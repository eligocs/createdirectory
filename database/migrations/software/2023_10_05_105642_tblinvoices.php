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
        Schema::create('tblinvoices', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('sent')->default(0);
            $table->datetime('datesend')->nullable();
            $table->unsignedBigInteger('clientid');
            $table->text('deleted_customer_name', 100)->nullable();
            $table->integer('number');
            $table->text('prefix', 50)->nullable();
            $table->integer('number_format')->default(0);
            $table->datetime('datecreated');
            $table->date('date');
            $table->date('duedate')->nullable();
            $table->integer('currency');
            $table->decimal('subtotal', 15, 2);
            $table->decimal('total_tax', 15, 2)->default(0.00);
            $table->decimal('total', 15, 2);
            $table->decimal('adjustment', 15, 2)->nullable();
            $table->unsignedBigInteger('addedfrom')->nullable();
            $table->text('hash', 32);
            $table->integer('status')->default(1);
            $table->text('clientnote')->nullable();
            $table->text('adminnote')->nullable();
            $table->date('last_overdue_reminder')->nullable();
            $table->date('last_due_reminder')->nullable();
            $table->integer('cancel_overdue_reminders')->default(0);
            $table->mediumText('allowed_payment_modes')->nullable();
            $table->mediumText('token')->nullable();
            $table->decimal('discount_percent', 15, 2)->default(0.00);
            $table->decimal('discount_total', 15, 2)->default(0.00);
            $table->text('discount_type', 30);
            $table->integer('recurring')->default(0);
            $table->text('recurring_type', 10)->nullable();
            $table->tinyInteger('custom_recurring')->default(0);
            $table->integer('cycles')->default(0);
            $table->integer('total_cycles')->default(0);
            $table->unsignedBigInteger('is_recurring_from')->nullable();
            $table->date('last_recurring_date')->nullable();
            $table->text('terms')->nullable();
            $table->integer('sale_agent')->default(0);
            $table->text('billing_street', 200)->nullable();
            $table->text('billing_city', 100)->nullable();
            $table->text('billing_state', 100)->nullable();
            $table->text('billing_zip', 100)->nullable();
            $table->integer('billing_country')->nullable();
            $table->text('shipping_street', 200)->nullable();
            $table->text('shipping_city', 100)->nullable();
            $table->text('shipping_state', 100)->nullable();
            $table->text('shipping_zip', 100)->nullable();
            $table->integer('shipping_country')->nullable();
            $table->tinyInteger('include_shipping')->default(0);
            $table->tinyInteger('show_shipping_on_invoice')->default(1);
            $table->integer('show_quantity_as')->default(1);
            $table->integer('project_id')->default(0);
            $table->integer('subscription_id')->default(0);
            $table->text('short_link', 100)->nullable();
            $table->text('Array', 255)->nullable();
            $table->text('advance_to_merge', 255)->nullable();
            $table->text('merge_advance', 255)->nullable();
            $table->text('removed_items', 255)->nullable();

            // Define foreign key constraints
            //$table->foreign('clientid')->references('id')->on('tblcustomers')->onDelete('cascade');
            //$table->foreign('addedfrom')->references('id')->on('tblstaff')->onDelete('set null');
            //$table->foreign('is_recurring_from')->references('id')->on('tblinvoices')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblinvoices');
    }
};
