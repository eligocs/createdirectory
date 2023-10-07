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
        Schema::create('bankpayment_link', function (Blueprint $table) {
            $table->id();
            $table->string('payment_link', 255);
            $table->tinyInteger('del_status')->default(0);
            $table->timestamps(6); // Adds 'Created_date' with microseconds
 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bankpayment_link');
    }
};
