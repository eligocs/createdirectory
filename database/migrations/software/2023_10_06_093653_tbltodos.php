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
        Schema::create('tbltodos', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->integer('staffid');
            $table->datetime('dateadded');
            $table->tinyInteger('finished');
            $table->datetime('datefinished')->nullable();
            $table->integer('item_order')->nullable();
            $table->timestamps();


        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbltodos');
    }
};
