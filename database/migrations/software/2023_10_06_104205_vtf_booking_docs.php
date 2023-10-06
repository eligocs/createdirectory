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
        Schema::create('vtf_booking_docs', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id');
            $table->integer('iti_id');
            $table->text('file_url');
            $table->text('description');
            $table->integer('agent_id');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtf_booking_docs');
    }
};
