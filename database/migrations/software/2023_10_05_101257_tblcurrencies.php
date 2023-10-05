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
        Schema::create('tblcurrencies', function (Blueprint $table) {
            $table->id();
            $table->string('symbol', 10);
            $table->string('name', 100);
            $table->string('decimal_separator', 5)->nullable();
            $table->string('thousand_separator', 5)->nullable();
            $table->string('placement', 10)->nullable();
            $table->tinyInteger('isdefault')->default(0);

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define any additional columns or constraints if needed.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcurrencies');
    }
};
