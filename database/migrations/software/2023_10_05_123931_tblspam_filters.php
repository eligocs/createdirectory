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
        Schema::create('tblspam_filters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 40);
            $table->string('rel_type', 10);
            $table->text('value');
            $table->timestamps(); // Optional timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblspam_filters');
    }
};
