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
        Schema::create('other_vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vendor_name', 255);
            $table->string('vendor_contact', 20);
            $table->integer('vendorCategory');
            $table->string('vendor_address', 255);
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_vendors');
    }
};
