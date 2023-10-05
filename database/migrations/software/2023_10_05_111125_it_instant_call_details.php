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
        Schema::create('it_instant_call_details', function (Blueprint $table) {
            $table->id();
            $table->string('mobile', 20);
            $table->string('query_from', 50);
            $table->integer('followup')->default(0)->comment('1=done,0=pending');
            $table->timestamps(0); // Use 0 for Laravel 7 and later
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('it_instant_call_details');
    }
};
