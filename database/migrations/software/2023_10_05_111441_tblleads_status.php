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
        Schema::create('tblleads_status', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->integer('statusorder')->nullable();
            $table->string('color', 10)->default('#28B8DA');
            $table->integer('isdefault')->default(0);

            // Define foreign key constraints here if needed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblleads_status');
    }
};
