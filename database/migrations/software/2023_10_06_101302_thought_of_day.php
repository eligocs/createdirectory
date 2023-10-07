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
        Schema::create('thought_of_day', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->default(0)->comment('1=img, 2=video, 0=text');
            $table->text('content');
            $table->integer('status')->default(0)->comment('1=disabled');
            $table->integer('updated_by');
            $table->timestamp('updated');

            // Additional indexes or foreign key constraints can be added if needed.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thought_of_day'); 
    }
};
