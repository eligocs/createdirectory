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
        Schema::create('tblacc_budget_details', function (Blueprint $table) {
            $table->id();
            $table->integer('budget_id');
            $table->integer('month');
            $table->integer('year');
            $table->integer('account')->nullable();
            $table->decimal('amount', 15, 2)->default(0.00);
            $table->timestamps(); // You can include timestamps if needed.

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraint for budget_id if needed.
            // $table->foreign('budget_id')->references('id')->on('tblacc_budgets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_budget_details');
    }
};
