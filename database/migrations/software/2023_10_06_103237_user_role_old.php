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
        Schema::create('user_role_old', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id')->nullable();
            $table->string('role_name', 255);
            $table->string('comment', 255)->nullable();
            $table->timestamp('created')->useCurrent();
            $table->string('role_slug', 30)->nullable();
            $table->integer('position');
            $table->string('status', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role_old');
    }
};
