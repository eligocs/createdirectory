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
        Schema::create('offer', function (Blueprint $table) {
            $table->increments('offerid');
            $table->string('offer_image', 100);
            $table->string('offerslug', 100);
            $table->string('title1', 100);
            $table->string('content1', 600);
            $table->string('title2', 100);
            $table->string('content2', 600);
            $table->string('title3', 100);
            $table->string('content3', 600);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer');
    }
};
