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
        Schema::create('tblannouncements', function (Blueprint $table) {
            $table->id('announcementid');
            $table->string('name', 191);
            $table->text('message')->nullable();
            $table->integer('showtousers');
            $table->integer('showtostaff');
            $table->integer('showname');
            $table->datetime('dateadded');
            $table->string('userid', 100);

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
        Schema::dropIfExists('tblannouncements');
    }
};
