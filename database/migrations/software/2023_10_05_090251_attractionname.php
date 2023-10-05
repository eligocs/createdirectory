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
        Schema::create('attractionname', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attractionId')->nullable();
            $table->string('att_name', 255)->nullable();
            $table->timestamps();

            $table->foreign('attractionId')->references('id')->on('attraction'); // Assuming you have an 'attraction' table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attractionname');
    }
};
