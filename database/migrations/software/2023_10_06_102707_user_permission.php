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
        Schema::create('user_permission', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('sub_cat_id')->nullable();
            $table->integer('sub_sub_cat_id')->nullable();
            $table->string('permission_name', 200);
            $table->string('permission_slug', 200);
            $table->string('description', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_permission');
    }
};
