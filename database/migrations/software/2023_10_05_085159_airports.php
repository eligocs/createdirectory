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
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('airport_code', 50)->nullable();
            $table->string('airport_name', 255)->nullable();
            $table->string('city_code', 60)->nullable();
            $table->string('city_name', 200)->nullable();
            $table->string('country_name', 200)->nullable();
            $table->string('country_code', 90)->nullable();
            $table->integer('top_cities')->nullable();
            $table->decimal('markup_fee', 10, 0)->nullable();
            $table->string('markup_type', 50)->nullable();
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
            $table->integer('priority')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
