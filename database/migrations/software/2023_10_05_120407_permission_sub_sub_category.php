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
        Schema::create('permission_sub_sub_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_subcategory');
            $table->integer('permission_sub_sub_Cat');
            $table->string('permission_sub_sub_cat_name', 120);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_sub_sub_category');
    }
};
