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
        Schema::create('itinerary_visiter_data', function (Blueprint $table) {
            $table->id();
            $table->integer('iti_id');
            $table->integer('visit_count');
            $table->string('last_visit', 200);
            $table->string('customer_id', 200)->nullable();
            $table->string('first_visit', 200);
            $table->timestamps(); // Add created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerary_visiter_data');
    }
};
