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
        Schema::create('tblevents', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description')->nullable();
            $table->integer('userid');
            $table->datetime('start');
            $table->datetime('end')->nullable();
            $table->integer('public')->default(0);
            $table->string('color', 10)->nullable();
            $table->tinyInteger('isstartnotified')->default(0);
            $table->integer('reminder_before')->default(0);
            $table->string('reminder_before_type', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblevents');
    }
};
