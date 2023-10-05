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
        Schema::create('sms_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('auth_key', 100);
            $table->string('sender_id', 20);
            $table->timestamp('updated')->default(\DB::raw('current_timestamp() on update current_timestamp()'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_settings');
    }
};
