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
        Schema::create('package_category', function (Blueprint $table) {
            $table->increments('p_cat_id');
            $table->string('package_cat_name', 200);
            $table->string('del_status', 10)->default('0');
            $table->timestamp('added_date')->default(\DB::raw('current_timestamp()'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_category');
    }
};
