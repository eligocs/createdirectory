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
        Schema::create('hrr_cab_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('del_status')->default(0);
            $table->integer('update_by');
            $table->longText('description')->nullable();
            $table->timestamps(6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrr_cab_categories');
    }
};
