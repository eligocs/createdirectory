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
        Schema::create('qrcodeimg', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imageName', 255);
            $table->integer('del_status')->default(0);
            $table->timestamp('created_Date', 6)->default(\DB::raw('current_timestamp(6) on update current_timestamp(6)'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qrcodeimg');
    }
};
