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
        Schema::create('homepage_setting', function (Blueprint $table) {
            $table->id();
            $table->string('logo_url', 500);
            $table->string('video_url', 500);
            $table->string('api_key', 500);
            $table->string('address', 500);
            $table->string('contact_no', 255);
            $table->string('website', 500);
            $table->string('counter', 255);
            $table->timestamps();
            $table->string('favicon', 500)->nullable();
            $table->string('pdf_img', 255)->nullable();
            $table->longText('account')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_setting');
    }
};
