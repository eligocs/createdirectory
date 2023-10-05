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
        Schema::create('tblpur_comments', function (Blueprint $table) {
            $table->id();
            $table->mediumText('content')->nullable();
            $table->string('rel_type', 50);
            $table->integer('rel_id')->nullable();
            $table->integer('staffid');
            $table->dateTime('dateadded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_comments');
    }
};
