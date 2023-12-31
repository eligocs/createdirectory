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
        Schema::create('tbltickets_pipe_log', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('email_to', 100);
            $table->string('name', 191);
            $table->string('subject', 191);
            $table->mediumText('message');
            $table->string('email', 100);
            $table->string('status', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbltickets_pipe_log');
    }
};
