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
        Schema::create('hrr_inclusion_rate', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id');
            $table->decimal('inclusion_rate', 15, 2)->nullable();
            $table->integer('inclusion_id');
            $table->timestamps();
            $table->integer('del_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrr_inclusion_rate');
    }
};
