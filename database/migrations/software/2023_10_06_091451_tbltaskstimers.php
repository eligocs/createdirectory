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
        Schema::create('tbltaskstimers', function (Blueprint $table) {
            $table->id();
            $table->integer('task_id');
            $table->string('start_time', 64);
            $table->string('end_time', 64)->nullable();
            $table->integer('staff_id');
            $table->decimal('hourly_rate', 15, 2)->default(0.00);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbltaskstimers');
    }
};
