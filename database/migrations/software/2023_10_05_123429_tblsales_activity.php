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
        Schema::create('tblsales_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rel_type', 20)->nullable();
            $table->integer('rel_id');
            $table->text('description');
            $table->text('additional_data')->nullable();
            $table->string('staffid', 11)->nullable();
            $table->string('full_name', 100)->nullable();
            $table->datetime('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblsales_activity');
    }
};
