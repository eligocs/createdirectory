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
        Schema::create('tbltracked_mails', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 32);
            $table->integer('rel_id');
            $table->string('rel_type', 40);
            $table->datetime('date');
            $table->string('email', 100);
            $table->tinyInteger('opened')->default(0);
            $table->datetime('date_opened')->nullable();
            $table->mediumText('subject')->nullable();
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbltracked_mails');
    }
};
