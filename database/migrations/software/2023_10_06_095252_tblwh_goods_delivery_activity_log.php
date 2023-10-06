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
        Schema::create('tblwh_goods_delivery_activity_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rel_id')->nullable();
            $table->string('rel_type', 100)->nullable();
            $table->mediumText('description');
            $table->text('additional_data')->nullable();
            $table->datetime('date')->nullable();
            $table->integer('staffid')->nullable();
            $table->string('full_name', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblwh_goods_delivery_activity_log');
    }
};
