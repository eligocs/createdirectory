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
        Schema::create('image_template', function (Blueprint $table) {
            $table->id();
            $table->string('img_name', 100);
            $table->string('url_path', 100);
            $table->string('slug', 100);
            $table->integer('temp_key');
            $table->timestamps(0); // Use timestamps(0) to prevent updated_at from being updated on insert
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_template');
    }
};
