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
                Schema::create('otp_expiry', function (Blueprint $table) {
            $table->increments('id');
            $table->string('otp', 6);
            $table->integer('is_expired')->default(0)->comment('0 = not expired, 1 = expired');
            $table->timestamp('created_at', 6)->default(\DB::raw('current_timestamp(6) on update current_timestamp(6)'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otp_expiry');
    }
};
