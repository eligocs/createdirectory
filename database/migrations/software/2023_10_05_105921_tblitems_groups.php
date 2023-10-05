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
        Schema::create('tblitems_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('commodity_group_code', 100)->nullable();
            $table->integer('order')->nullable();
            $table->integer('display')->nullable();
            $table->text('note')->nullable();
            // Add more columns as needed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblitems_groups');
    }
};
