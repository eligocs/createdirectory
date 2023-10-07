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
        Schema::create('tblrelated_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rel_id');
            $table->string('rel_type', 30);
            $table->integer('item_id');
            
            // Add foreign key constraints if necessary
            // //$table->foreign('rel_id')->references('id')->on('related_table');
            // //$table->foreign('item_id')->references('id')->on('item_table');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('tblrelated_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rel_id');
            $table->string('rel_type', 30);
            $table->integer('item_id');
            
            // Add foreign key constraints if necessary
            // //$table->foreign('rel_id')->references('id')->on('related_table');
            // //$table->foreign('item_id')->references('id')->on('item_table');
            
            $table->timestamps();
        });
    }
};
