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
        Schema::create('social_api', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fb_page_id', 100);
            $table->string('fb_app_id', 100);
            $table->string('fb_app_secret', 100);
            $table->text('fb_access_token');
            $table->string('twitter_api_key', 100);
            $table->string('twitter_api_secret', 100);
            $table->string('twitter_access_token', 200);
            $table->string('twitter_access_token_secret', 100);
            $table->timestamp('updated')->default(\DB::raw('current_timestamp() on update current_timestamp()'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_api');
    }
};
