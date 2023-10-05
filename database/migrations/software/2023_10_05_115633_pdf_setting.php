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
        Schema::create('pdf_setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pdf_name', 255);
            $table->string('pdf_img', 255)->nullable();
            $table->integer('status')->default(0);
            $table->string('preview', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdf_setting');
    }
};
