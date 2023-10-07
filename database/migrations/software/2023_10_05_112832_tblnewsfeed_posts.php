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
        Schema::create('tblnewsfeed_posts', function (Blueprint $table) {
            $table->id('postid');
            $table->unsignedBigInteger('creator');
            $table->datetime('datecreated');
            $table->string('visibility', 100);
            $table->text('content');
            $table->integer('pinned');
            $table->datetime('datepinned')->nullable();
            $table->timestamps();

            // Define foreign keys
            //$table->foreign('creator')->references('id')->on('tblusers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblnewsfeed_posts');
    }
};
