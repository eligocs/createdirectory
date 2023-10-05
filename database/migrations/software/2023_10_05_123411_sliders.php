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
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('image_url', 200);
            $table->integer('in_slider')->default(0)->comment('0=false,1=true');
            $table->integer('del_status')->default(0);
            $table->integer('agent_id');
            $table->timestamp('created')->default(\DB::raw('current_timestamp()'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
