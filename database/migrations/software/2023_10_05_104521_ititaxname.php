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
        Schema::create('ititaxname', function (Blueprint $table) {
            $table->id();
            $table->integer('iti_id');
            $table->string('taxname', 255);
            $table->timestamps(); // Add created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ititaxname');
    }
};
