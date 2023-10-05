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
        Schema::create('tblpur_vendor_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor')->unsigned();
            $table->integer('group_items')->nullable();
            $table->string('items', 255);
            $table->integer('add_from')->nullable();
            $table->date('datecreate')->nullable();

            // Add foreign key constraints if necessary
            $table->foreign('vendor')->references('id')->on('tblpur_vendor');
            $table->foreign('add_from')->references('id')->on('your_reference_table');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_vendor_items');
    }
};
