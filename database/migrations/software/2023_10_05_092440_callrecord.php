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
        Schema::create('callrecord', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cus_id');
            $table->string('audio', 255)->nullable();
            $table->unsignedInteger('status')->default(0);
            $table->unsignedBigInteger('iti_id')->nullable();
            $table->timestamps(6);

            //$table->foreign('cus_id')->references('id')->on('customers');
            //$table->foreign('iti_id')->references('id')->on('itineraries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('callrecord');
    }
};
