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
        Schema::create('marketing_category', function (Blueprint $table) {
            $table->id();
            $table->integer('super_category')->default(0)->comment('1=true: Can"t be deleted');
            $table->string('category_name', 200);
            $table->integer('del_status')->default(0);
            $table->text('added_date', 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketing_category');
    }
};
