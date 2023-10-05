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
        Schema::create('tblacc_item_automatics', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            $table->integer('inventory_asset_account')->default(0);
            $table->integer('income_account')->default(0);
            $table->integer('expense_account')->default(0);
            $table->timestamps(); // You can include timestamps if needed.

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // $table->foreign('item_id')->references('id')->on('your_item_table_name');
            // $table->foreign('inventory_asset_account')->references('id')->on('your_inventory_asset_account_table_name');
            // $table->foreign('income_account')->references('id')->on('your_income_account_table_name');
            // $table->foreign('expense_account')->references('id')->on('your_expense_account_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_item_automatics');
    }
};
