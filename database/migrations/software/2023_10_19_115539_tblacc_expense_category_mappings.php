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
        Schema::create('tblacc_expense_category_mappings', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing 'id' column.
            $table->integer('category_id');
            $table->integer('payment_account')->default(0);
            $table->integer('deposit_to')->default(0);
            $table->integer('preferred_payment_method')->default(0);
            $table->timestamps(); // This will create 'created_at' and 'updated_at' columns for timestamps.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_expense_category_mappings');
    }
};
