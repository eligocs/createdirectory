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
        Schema::create('tblpur_vendor_cate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name', 255)->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default(0);

            // Add any other columns or constraints here if necessary

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_vendor_cate');
    }
};
