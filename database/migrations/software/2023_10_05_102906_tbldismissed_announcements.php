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
        Schema::create('tbldismissed_announcements', function (Blueprint $table) {
            $table->id('dismissedannouncementid');
            $table->unsignedBigInteger('announcementid');
            $table->unsignedBigInteger('staff');
            $table->unsignedBigInteger('userid');

            // Define foreign key constraints
            //$table->foreign('announcementid')->references('announcementid')->on('tblannouncements');
            //$table->foreign('staff')->references('id')->on('tblstaff');
            //$table->foreign('userid')->references('userid')->on('tblusers');

            $table->timestamps();
            
            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbldismissed_announcements');
    }
};
