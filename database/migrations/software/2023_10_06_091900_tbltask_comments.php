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
        Schema::create('tbltask_comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->integer('taskid');
            $table->integer('staffid');
            $table->integer('contact_id')->default(0);
            $table->integer('file_id')->default(0);
            $table->datetime('dateadded');
            $table->timestamps();

            // Define foreign key relationships if necessary
            // //$table->foreign('taskid')->references('id')->on('tbltasks');
            // //$table->foreign('staffid')->references('id')->on('staff');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbltask_comments');
    }
};
