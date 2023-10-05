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
        Schema::create('tblnewsfeed_post_comments', function (Blueprint $table) {
            $table->id();
            $table->text('content')->nullable();
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('postid');
            $table->datetime('dateadded');
            $table->timestamps();

            // Define foreign keys
            $table->foreign('userid')->references('id')->on('tblusers')->onDelete('cascade');
            $table->foreign('postid')->references('postid')->on('tblnewsfeed_posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblnewsfeed_post_comments');
    }
};
