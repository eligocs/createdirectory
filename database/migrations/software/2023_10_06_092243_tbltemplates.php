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
        Schema::create('tbltemplates', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->string('name', 255);
            $table->string('type', 100);
            $table->integer('addedfrom');
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbltemplates');
    }
};
