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
        Schema::create('tblnewsfeed_comment_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postid');
            $table->unsignedBigInteger('commentid');
            $table->unsignedBigInteger('userid');
            $table->datetime('dateliked');
            $table->timestamps();

            // Define foreign keys
            $table->foreign('postid')->references('id')->on('tblnewsfeed_posts')->onDelete('cascade');
            $table->foreign('commentid')->references('id')->on('tblnewsfeed_comments')->onDelete('cascade');
            $table->foreign('userid')->references('id')->on('tblusers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblnewsfeed_comment_likes');
    }
};
