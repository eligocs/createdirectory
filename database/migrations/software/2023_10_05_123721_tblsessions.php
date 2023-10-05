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
        Schema::create('tblsessions', function (Blueprint $table) {
            $table->string('id', 128)->primary();
            $table->string('ip_address', 45);
            $table->unsignedInteger('timestamp')->default(0);
            $table->binary('data');
            $table->timestamps(); // Optional timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblsessions');
    }
};
