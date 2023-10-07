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
        Schema::create('tbltaggables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rel_id');
            $table->string('rel_type', 20);
            $table->unsignedBigInteger('tag_id');
            $table->integer('tag_order')->default(0);

            $table->timestamps();

            $table->index(['rel_id', 'rel_type']);
            //$table->foreign('tag_id')->references('id')->on('tbltags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbltaggables');
    }
};
