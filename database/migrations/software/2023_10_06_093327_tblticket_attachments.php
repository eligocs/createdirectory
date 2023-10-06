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
        Schema::create('tblticket_attachments', function (Blueprint $table) {
            $table->id();
            $table->integer('ticketid');
            $table->integer('replyid')->nullable();
            $table->string('file_name', 191);
            $table->string('filetype', 50)->nullable();
            $table->datetime('dateadded');
            $table->timestamps();

            // Add foreign key constraints if needed
            // $table->foreign('ticketid')->references('ticketid')->on('tbltickets');
            // $table->foreign('replyid')->references('id')->on('tblreplies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblticket_attachments'); 
    }
};
