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
        Schema::create('tblcurrency_rate_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_currency_id')->nullable();
            $table->string('from_currency_name', 100)->nullable();
            $table->decimal('from_currency_rate', 15, 6)->default(0.000000);
            $table->unsignedBigInteger('to_currency_id')->nullable();
            $table->string('to_currency_name', 100)->nullable();
            $table->decimal('to_currency_rate', 15, 6)->default(0.000000);
            $table->date('date')->nullable();

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // $table->foreign('from_currency_id')->references('id')->on('tblcurrencies');
            // $table->foreign('to_currency_id')->references('id')->on('tblcurrencies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcurrency_rate_logs');
    }
};
