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
        Schema::create('hrr_cab_rate', function (Blueprint $table) {
            $table->id();
            $table->integer('route_id');
            $table->integer('trans_id');
            $table->integer('cab_cate_id');
            $table->double('price', 15, 2);
            $table->integer('update_by');
            $table->timestamps();
            $table->integer('seasson_rate')->nullable();
            $table->integer('del_status')->default(0);
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrr_cab_rate');
    }
};
